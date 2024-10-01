<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
    public function index(){
        return view('login');
    }
    //
    public function trangchu() {
        return view('home');
    }
    public function _trangchu(Request $request){
        $user_email = $request->user_email;
        $user_password = $request->user_password;
        $result = DB::table('taikhoan_sinhvien')->where('email',$user_email)->where('password', $user_password)->first();
        
        if($result){
            Session::put('IDTK',$result->IDTK);
            Session::put('HOTEN',$result->HOTEN);
            Session::put('avt',$result->avt);
            
            
            //Session::put('password',$result->password);
            return Redirect::to('/home');
        }else{
            Session::put('message','Email hoặc mật khẩu đăng nhập không chính xác!');
            return Redirect::to('/user');
        }
    }
    public function logout(){
        Session::put('IDTK',null);
        Session::put('HOTEN', null);
        Session::put('avt',null);
        return Redirect::to('/home');

    }
       
}
    
