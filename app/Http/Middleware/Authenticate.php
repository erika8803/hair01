<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
// 追加
use Illuminate\Support\Facades\Route;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            
            // Adominユーザーの場合追加
            if (Route::is('admin.*')) {
                return route('admin.login');
            }
            return route('login');
        }
    }
}
