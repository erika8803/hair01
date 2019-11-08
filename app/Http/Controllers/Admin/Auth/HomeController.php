<?php

// Admin を追加
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 追加
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // admin を追加
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // adminを追加
        return view('admin.auth.home');
    }
}
