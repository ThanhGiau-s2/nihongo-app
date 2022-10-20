<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\nhanvien;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use RegistersUsers;
   

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'ad/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function getLogin () {
    	return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('nhanvien')->attempt($credentials,$request->has('remember'))) {
            return redirect($this->redirectPath());
        }
        else{
            return back()->with('thongbao','Email hoặc mật khẩu không đúng!');;
        }
    }
    public function getRegister() {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {       
        Auth::guard('nhanvien')->login($this->create($request->all()));
        return redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Nhanvien::create([
            'ten' => $data['ten'],
            'ngaysinh' => $data['ngaysinh'],
            'gioitinh' => $data['gioitinh'],
            'hoatdong' => $data['hoatdong'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}