<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 使用する Model 名を追加
use App\Portfolio;
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
          $path = $request->file('image')->store('public/image');
          $portfolio->image_path = basename($path);
        } else {
          $portfolio->image_path = null;
        }
        
          // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        unset($form['image']);
        
          // データベースに保存
        $portfolio->fill($form);
        $portfolio->save();
    
            // リダイレクトする
        return redirect('admin/portfolio');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            // 検索されたら結果を取得
          $posts = Portfolio::where('name', $cond_title)->get();
        } else {
            // それ以外はすべて取得
          $posts = Portfolio::all();
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
        
        if (isset($protfolio_form['image'])) {
          $path = $request->file('image')->store('public/image');
          $portfolio->image_path = basename($path);
          
          } elseif (isset($request->remove)) {
              $portfolio->image_path = null;
            }
            
         unset($portfolio_form['_token']);
         unset($portfolio_form['image']);
         unset($portfolio_form['remove']);
    
        $portfolio->fill($portfolio_form)->save();
        
        return redirect('admin/portfolio');
      }
      
    public function delete(Request $request)
    {
        $portfolio = Portfolio::find($request->id);
        $portfolio->delete();
        return redirect('admin/portfolio');
    }
      
  }
