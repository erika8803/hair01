<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

// 追加
use Request;
use Response;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
    // 認証していない場合にガードを見てそれぞれのログインページへ飛ばず
    protected function unauthenticated($request, AuthenticationException $exception)
  {
      // JSONの対応
      if($request->expectsJson()) {
          return response()->json(['error' => 'Unauthenticated.'], 401);
      }

      // Adminの対応
       if(in_array('admin', $exception->guards(), true )) {
           return redirect()->route('admin.login');
       }

      // Userの対応
      return redirect()->route('login');
  }
    
}
