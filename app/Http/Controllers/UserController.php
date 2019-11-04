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
      
      if (count($posts) > 0) {
        $headline = $posts->shift();
      } else {
        $headline = null;
      }
      return view('portfolio.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
