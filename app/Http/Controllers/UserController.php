<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追加
use App\Portfolio;

class UserController extends Controller
{
    public function index(Request $request)
    {
      // 投稿日時順に表示
      $posts = Portfolio::all()->sortByDesc('updated_at');
    
      return view('portfolio.index', ['posts' => $posts]);
    }
    
    public function edit(Request $request)
    {
      $profile = Profiles::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }
}
