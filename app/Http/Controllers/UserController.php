<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追加
use Auth;
use App\Profile;
use App\Portfolio;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title !='') {
        $posts = Portfolio::where('hair_style', 'LIKE', "%$cond_title%" )->orderBy('created_at', 'DESC')->get();
      } else {
        $posts = Portfolio::all()->sortByDesc('updated_at');
      }
      
      // // 投稿日時順に表示
      // $posts = Portfolio::all()->sortByDesc('updated_at');
    
      return view('user.portfolio_index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function show(Request $request)
    {
       $profile = Profile::where('user_id', $request->id)->first();
       
      // if (empty($profile)) {
      //   abort(404);
      // }
      return view('user.profile_index', ['profile' => $profile]);
    }
}
