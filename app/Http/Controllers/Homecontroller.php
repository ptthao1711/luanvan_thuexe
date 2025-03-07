<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // dùng để thao tác với csdl.
use Session; // dùng để  lưu tạm các message sau khi thực hiện một công việc gì đó.
use App\Http\Requests; // dùng để lấy dữ liệu từ form
use Illuminate\Support\Facades\Redirect; // dùng để chuyển hướng


class Homecontroller extends Controller
{
    
    public function register(){
        return view('pages.profile');
    }
    public function regist(){
        return view('register');
    }
    public function order_buy(){
        return view('pages.order_buy');
    }
    
    public function admin(){
        return view('admin.admin_home');
    }
    public function admin_new(){
        return view('admin.admin_news');
    }
    public function mynews(){
        return view('pages.mynews');
    }
    public function hopdong(){
        return view('pages.hopdong');
    }
    public function chat(){
        return view('pages.chat_home');
    }
    public function admin_taikhoan(){
        return view('admin.admin_taikhoan');
    }
    public function thanks(){
        return view('pages.order_thank');
    }
    public function admin_giaodich(){
        return view('admin.admin_xulygiaodich');
    }
    public function account(){
        return view('pages.detail_account');
    }
    public function thongke(){
        return view('admin.admin_thongke');
    }
    public function map(){
        return view('layouts.map');
    }
    public function admin_thongke_user(){
        return view('admin.admin_thongke_user');
    }
}
