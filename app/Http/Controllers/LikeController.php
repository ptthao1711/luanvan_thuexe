<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Session; // dùng để  lưu tạm các message sau khi thực hiện một công việc gì đó.
use App\Http\Requests; // dùng để lấy dữ liệu từ form
use Illuminate\Support\Facades\Redirect; // dùng để chuyển hướng
use App\Models\Category;
use App\Models\Motocycle;
use function Laravel\Prompts\select;

class LikeController extends Controller{
     public function getlike(){
        $getlike_user = DB::table('likes')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK', '=','likes.IDTK')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->join('xe','xe.IDTK','=','taikhoan_sinhvien.IDTK')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->select('tinthuexe.IDTK','tinthuexe.TIEUDE','tinthuexe.PRICE','image.DUONGDAN')
        ->orderBy('tinthuexe.IDTK')
        ->get();

         //return view('header', ['getlike_user'=>$getlike_user]);
         return view('pages.news', ['getlike_user'=>$getlike_user]);
     }
    
}