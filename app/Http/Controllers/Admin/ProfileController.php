<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 使用する Model 名を追加
use App\Profile;
class ProfileController extends Controller
{
    public function add()
        {
          return view('admin.profile.create');
        }
        
    public function create(Request $request)
        {
            // Validationを行う $thisは擬似変数と呼ばれ、呼び出し元のオブジェクトへの参照を意味します
          $this->validate($request, Profile::$rules);
        
            // Profile Modelからデータを取得
          $profile = new Profile;
          
            // form に入力された値を取得
          $form = $request->all();
          
            // フォームから画像が送信されてきたら、保存。＄image_path に画像のパスを保存する
          if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
          } else {
            $profile->image_path = null;
          }
          
            // フォームから送信されてきた_tokenを削除する
          unset($form['_token']);
          unset($form['image']);
          
            // データベースに保存
          $profile->fill($form);
          $profile->save();
    
              // リダイレクトする
          return redirect('admin/profile/create');
        }
    
    public function index(Request $request)
        {
          $cond_title = $request->cond_title;
          if ($cond_title !='') {
              // 検索されたら結果を取得
            $posts = Profile::where('name', $cond_title)->get();
          } else {
              // それ以外はすべて取得
            $posts = Profile::all();
          }
          return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
        }
    
    public function edit(Request $request)
        {
          $profile = Profile::find($request->id);
          if (empty($profile)) {
            abort(404);
          }
          return view('admin.profile.edit', ['profile_form' => $profile]);
        }
  
    public function update(Request $request)
        {
          // Varidationをかける
          $this->validate($request, Profile::$rules);
          
          // Profile Modelからデータを取得
          $profile = Profile::find($request->id);
          
          // 送信されてきたフォームデータを格納する
          $profile_form = $request->all();
          
          if (iseet($profile_form['image'])) {
            $path =$request->file('image')->store('public/image');
            $profile->image_path = basename($path);
            
          } elseif (isset($request->remove)) {
            $profile->image_path = null;
          }
          
          // 削除
          unset($profile_form['_token']);
          unset($profile_form['image']);
          unset($profile_form['remove']);
          
          // 該当するデータを上書きして保存
          $profile->fill($profile_form)->save();
          
          return redirect('admin/Profile');
        }
        
    public function delete(Request $request)
    {
          $profile = Profile::find($request->id);
          $profile->delete();
          return redirect('admin/profile');
    }
    
}
