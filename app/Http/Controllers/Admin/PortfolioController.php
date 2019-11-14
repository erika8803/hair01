<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 追加
use Auth;
// 使用する Model 名を追加
use App\Portfolio;
// 画像保存
use Storage;

class PortfolioController extends Controller
{
    public function add()
    {
        return view('admin.portfolio.create');
    }
        
    public function create(Request $request)
    {
          // Validationを行う $thisは擬似変数と呼ばれ、呼び出し元のオブジェクトへの参照を意味します
        $this->validate($request, Portfolio::$rules);
      
          // Modelからデータを取得
        $portfolio = new Portfolio;
        
          // form に入力された値を取得
        $form = $request->all();
        
          // フォームから画像が送信されてきたら、保存。＄image_path に画像のパスを保存する
        if (isset($form['image'])) {
          
            // 画像保存
            // $path = $request->file('image')->store('public/image');
            // $portfolio->image_path = basename($path);
          
          // herokuへ画像保存 バケットのフォルダへアップロード
          $path = Storage::disk('s3')->putfile('/',$request->file('image'),'public');
          
          // アップロードした画像のフルパスを取得
          $form['image_path'] = Storage::disk('s3')->url($path);
          
        } else {
           $form['image_path'] = null;
        }
        
          // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        unset($form['image']);
        
          // データベースに保存
        $portfolio->fill($form);
        $portfolio->user_id = Auth::user()->id;
        $portfolio->save();
    
            // リダイレクトする
        return redirect('admin/portfolio');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            // 検索されたら結果を取得
          $posts = Portfolio::where('hair_style', 'LIKE', "%$cond_title%" )->where('user_id', Auth::user()->id )->orderBy('created_at', 'DESC')->get();
        } else {
            // それ以外はすべて取得
          $posts = Portfolio::where('user_id', Auth::user()->id )->orderBy('created_at', 'DESC')->get();
        }
        return view('admin.portfolio.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // portholio Modelからデータを取得
        $portfolio = Portfolio::find($request->id);
        if (empty($portfolio)) {
          abort(404);
        }
        // ログイン中のユーザーIDを、$portfolioのuser_idが一致しているか確認
        if ($portfolio->user_id !== Auth::user()->id) {
          abort(404);
        }
        return view('admin.portfolio.edit', ['portfolio_form' => $portfolio]);
    }
    
    public function update(Request $request)
    {
        // Varidationをかける
        $this->validate($request, Portfolio::$rules);
        
        // portfolio Model からデータを取得
        $portfolio = Portfolio::find($request->id);
        
        // 送信されてきたフォームデータを格納する
        $portfolio_form = $request->all();
        
        if (isset($portfolio_form['image'])) {
         
          // 画像保存
          // $path = $request->file('image')->store('public/image');
          // $portfolio->image_path = basename($path);
          
         // herokuへ画像保存 バケットのフォルダへアップロード
          $path = Storage::disk('s3')->putfile('/',$request->file('image'),'public');
          
          // アップロードした画像のフルパスを取得
          $portfolio_form['image_path'] = Storage::disk('s3')->url($path);
          
          
          } elseif (isset($request->remove)) {
              $portfolio_form['image_path'] = null;
            }
            
         unset($portfolio_form['_token']);
         unset($portfolio_form['image']);
         unset($portfolio_form['remove']);
    
        $portfolio->fill($portfolio_form)->save();
        
        return redirect('admin/portfolio');
      }
      
    public function delete(Request $request)
    {
        // portfolio Modelからデータを取得
        $portfolio = Portfolio::find($request->id);
       
        // ログイン中のユーザーIDと、$portfolioのuser_idが一致しているか確認
        if ($portfolio->user_id !== Auth::user()->id) {
          abort(404);
        }
        $portfolio->delete();
        return redirect('admin/portfolio');
    }
      
  }
