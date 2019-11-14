<?php

// Adminの追加
namespace App\Http\Controllers\Admin\Auth;

// User→Adminに変更
use App\Admin;

// 追加
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     
    //  リダイレクト先
    protected $redirectTo = 'admin/home';
    
    
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }


    // 管理者用テンプレート
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }



    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


/**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return User
    */
    protected function create(Request $request)
    {
        $data = $request->all();
        // Adminに変更
        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    
        // ログインさせる
        $user = Auth::guard('admin')->loginUsingId($admin->id);
        if (!$user) {
            return redirect('/admin/login');
        }
    
        return redirect('/admin/home');
    }
//     public function register(Request $request)
//   {
//       $this->validator($request->all())->validate();
//       event(new Registered($user = $this->create($request->all())));
//     //   Mail::to($ser->email)->send(new ConfirmationEmail($user));
//     //   return back()->with('status','メールアドレスを確認して下さい。');
//     return redirect ('admin.auth.login');
//   }
    
    
    // // 管理者認証のguardを指定
    // protected function guard()
    // {
    //     return Auth::guard('admin');
    // }
    
}
