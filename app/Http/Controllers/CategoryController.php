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

session_start();


class CategoryController extends Controller
{
    public function viewCategories(){
      
       $allcategorynews = DB::table('xe')
       ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->select('tinthuexe.TIEUDE','tinthuexe.PRICE','image.DUONGDAN','tinthuexe.timepost','tinthuexe.VITRI')
       ->get(); 
       //dd($allcategorynews);
       //$manager_category_news = view('home')->with('all_category_product',$allcategorynews);
       //return view('home')->with('home_category',$manager_category_news);

       return view('home', ['allcategorynews' => $allcategorynews]);
       //return view('home')->with('allcategorynews', $allcategorynews);
      
        

    }

    public function AddCategory_produce(Request $request){
        $data = array();
        $data["TIEUDE"]= $request->tieude;
        $data["PRICE"]= $request->price;
        $data["DUONGDAN"]= $request->anhtin;

        echo '<pre>';
        print_r($data);
        echo '</pre>';

    }
    public function Allcategory(Request $request){
        $allcate= DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->get();
        
        return view('pages.news',['allcate'=>$allcate]);

    }
}
