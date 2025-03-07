<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Session; 

session_start();


class SearchController extends Controller
{
    
    public function viewCategories(Request $request,$id_loai){

        
        $idTK = Session::get('IDTK');
        
        $countlikes=DB::table('likes')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('taikhoan_sinhvien.IDTK', $idTK)
        ->select('taikhoan_sinhvien.IDTK','tinthuexe.ID_TIN')
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        $count=count($countlikes);
 
        $getlike_user = session('getlike_user');
    
        $allcategorynews = DB::table('xe')
        ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->where('xe.ID_LOAI',$id_loai)
        ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE', 'tinthuexe.timepost',  'tinthuexe.ID_TIN')  
        ->get();
    
        $loaixe=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->where('ID_LOAI', '<>', 1)
        ->get();
 
         $getsearch=DB::table('search')
         ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
         ->where( 'search.IDTK',$idTK)
         ->select('search.IDTK','search.WORD')
         ->orderBy('search.IDTK')
         ->get();
 
         $tinhtrang=DB::table('tinhtrangxe')
         ->select('ID_TTX','TenTTX')
         ->get();

         $quanhuyen=DB::table('quanhuyen')
        ->get();
        
         return view('pages.search_menu',['quanhuyen'=>$quanhuyen,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'allcategorynews'=> $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
       
     }

     public function newsbytt($id_ttx){

        $idTK = Session::get('IDTK');
        
        $countlikes=DB::table('likes')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('taikhoan_sinhvien.IDTK', $idTK)
        ->select('taikhoan_sinhvien.IDTK','tinthuexe.ID_TIN')
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        $count=count($countlikes);

        
 
        $getlike_user = DB::table('likes')  
        ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
        ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
        ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('taikhoan_sinhvien.IDTK', $idTK)  
        ->select('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
        ->groupBy('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost','tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE')  
        ->orderBy('tinthuexe.IDTK')  
        ->get();

        $allcategorynews = DB::table('xe')
        ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->Where('tinhtrangxe.ID_TTX',$id_ttx)
        ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->get();

        $loaixe=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->where('ID_LOAI', '<>', 1)
        ->get();
 
         $getsearch=DB::table('search')
         ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
         ->where( 'search.IDTK',$idTK)
         ->select('search.IDTK','search.WORD')
         ->orderBy('search.IDTK')
         ->get();
 
         $tinhtrang=DB::table('tinhtrangxe')
         ->select('ID_TTX','TenTTX')
         ->get();

         $quanhuyen=DB::table('quanhuyen')
        ->get();
         return view('pages.search_menu',['quanhuyen'=>$quanhuyen,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'allcategorynews'=> $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
     }
     public function newsbyprice(){

        $idTK = Session::get('IDTK');
        
        $countlikes=DB::table('likes')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('taikhoan_sinhvien.IDTK', $idTK)
        ->select('taikhoan_sinhvien.IDTK','tinthuexe.ID_TIN')
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        $count=count($countlikes);

        
 
        $getlike_user = DB::table('likes')  
        ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
        ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
        ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('taikhoan_sinhvien.IDTK', $idTK)  
        ->select('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
        ->groupBy('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost','tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE')  
        ->orderBy('tinthuexe.IDTK')  
        ->get();

        $allcategorynews = DB::table('xe')
        ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->Where('tinthuexe.PRICE','>',0)
        ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->orderBy('tinthuexe.PRICE', 'asc')
        ->get();

        $loaixe=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->where('ID_LOAI', '<>', 1)
        ->get();
 
         $getsearch=DB::table('search')
         ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
         ->where( 'search.IDTK',$idTK)
         ->select('search.IDTK','search.WORD')
         ->orderBy('search.IDTK')
         ->get();
 
         $tinhtrang=DB::table('tinhtrangxe')
         ->select('ID_TTX','TenTTX')
         ->get();

         $quanhuyen=DB::table('quanhuyen')
        ->get();
         return view('pages.search_menu',['quanhuyen'=>$quanhuyen,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'allcategorynews'=> $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
     }

     public function newsbyprice1(){

        $idTK = Session::get('IDTK');
        
        $countlikes=DB::table('likes')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('taikhoan_sinhvien.IDTK', $idTK)
        ->select('taikhoan_sinhvien.IDTK','tinthuexe.ID_TIN')
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        $count=count($countlikes);

        
 
        $getlike_user = DB::table('likes')  
        ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
        ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
        ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('taikhoan_sinhvien.IDTK', $idTK)  
        ->select('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
        ->groupBy('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost','tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE')  
        ->orderBy('tinthuexe.IDTK')  
        ->get();

        $allcategorynews = DB::table('xe')
        ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->Where('tinthuexe.PRICE','>',0)
        ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa', 'tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->orderBy('tinthuexe.PRICE', 'DESC')
        ->get();

        $loaixe=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->where('ID_LOAI', '<>', 1)
        ->get();
 
         $getsearch=DB::table('search')
         ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
         ->where( 'search.IDTK',$idTK)
         ->select('search.IDTK','search.WORD')
         ->orderBy('search.IDTK')
         ->get();
 
         $tinhtrang=DB::table('tinhtrangxe')
         ->select('ID_TTX','TenTTX')
         ->get();
         $quanhuyen=DB::table('quanhuyen')
        ->get();
         return view('pages.search_menu',['quanhuyen'=>$quanhuyen,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'allcategorynews'=> $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
     }
     //----------------------------------------------------------------------------------------------------------------------------
     public function search_quanhuyen(Request $request, $idquan){

        $idTK = Session::get('IDTK');
        
        $countlikes=DB::table('likes')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('taikhoan_sinhvien.IDTK', $idTK)
        ->select('taikhoan_sinhvien.IDTK','tinthuexe.ID_TIN')
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        $count=count($countlikes);

        
 
        $getlike_user = DB::table('likes')  
        ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
        ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
        ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('taikhoan_sinhvien.IDTK', $idTK)  
        ->select('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
        ->groupBy('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost','tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE')  
        ->orderBy('tinthuexe.IDTK')  
        ->get();

        $allcategorynews = DB::table('xe')
        ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->join('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen')
        ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->Where('phuongxa.id_quan_huyen',$idquan)
        ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa', 'tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        
        ->get();

        $loaixe=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->where('ID_LOAI', '<>', 1)
        ->get();
 
         $getsearch=DB::table('search')
         ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
         ->where( 'search.IDTK',$idTK)
         ->select('search.IDTK','search.WORD')
         ->orderBy('search.IDTK')
         ->get();
 
         $tinhtrang=DB::table('tinhtrangxe')
         ->select('ID_TTX','TenTTX')
         ->get();

         $quanhuyen=DB::table('quanhuyen')
         ->get();

         return view('pages.search_menu',['quanhuyen'=>$quanhuyen,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'allcategorynews'=> $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
     }
     



         public function deletelikes($like_id){
             $deleted=DB::table('thuoc_like')
             ->where('ID_LIKE', $like_id)->delete();
             if ($deleted) {  
                
                 return redirect()->route('home')->with('success', 'Tin lưu đã xóa.');  
             } else {  
                 
                 return redirect()->route('home')->with('error', 'Like not found.');  
             }  
         }

         public function addSearch(Request $request){
            $idTK = Session::get('IDTK');
            $keywords = $request ->keywordsubmit;
            $add_search= DB::table('search')
            ->insert([
               'WORD'=>$keywords,
               'IDTK' => $idTK
           ]);
           if ($add_search) {  
            // Bạn có thể trả về một thông báo thành công hoặc điều hướng  
            return redirect()->route('search_key'); 
        } 
        
           
         }


        public function SearchKeywords(Request $request)  
        {  
              
            $word = $request->input('keywordsubmit');
            $idTK = Session::get('IDTK');
            $countlikes=DB::table('likes')
            ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
            ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
            ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
            ->where('taikhoan_sinhvien.IDTK', $idTK)
            ->select('taikhoan_sinhvien.IDTK','tinthuexe.ID_TIN')
            ->orderBy('taikhoan_sinhvien.IDTK')
            ->get();
            $count=count($countlikes);
            
            $getsearch=DB::table('search')
            ->select('search.IDTK','search.WORD','search.IDS')
            ->where( 'search.IDTK',$idTK)
            ->orderBy('search.IDTK')
            ->get();
     
           
            $getlike_user = DB::table('likes')  
            ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
            ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
            ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
            ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
            ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
            ->where('taikhoan_sinhvien.IDTK', $idTK)  
            ->select('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
            ->groupBy('tinthuexe.IDTK','tinthuexe.ID_TIN','tinthuexe.timepost','tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE')  
            ->orderBy('tinthuexe.IDTK')  
            ->get();
         
           
            $keywords = explode(' ', $word);
    
            $allcategorynews = DB::table('xe')
            ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
            ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
            ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
            ->join('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen')
            ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
            ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
            ->join('image','image.ID_XE','=','xe.ID_XE')
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhere('tinthuexe.TIEUDE', 'like', '%' . $word . '%')
                          ->orWhere('tinhtrangxe.TenTTX', 'like', '%' . $word . '%')
                          ->orWhere('loaixe.TEN_LOAI', 'like', '%' . $word . '%')
                          ->orWhere('xe.TENXE', 'like', '%' . $word . '%')
                          ->orWhere('phuongxa.ten_phuong_xa', 'like', '%' . $word . '%')
                          ->orWhere('quanhuyen.ten_quan_huyen', 'like', '%' . $word . '%')
                          ->orWhere('xe.MAUXE', 'like', '%' . $word . '%')
                          ->orWhere('tinthuexe.THONGTIN', 'like', '%' . $word . '%');
                }
            })
            ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
            ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa', 'tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
            ->get();
    
            $loaixe=DB::table('loaixe')
            ->select('ID_LOAI','TEN_LOAI')
            ->where('ID_LOAI', '<>', 1)
            ->get();
     
            $getsearch=DB::table('search')
            ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
            ->where( 'search.IDTK',$idTK)
            ->select('search.IDTK','search.WORD')
            ->orderBy('search.IDTK')
            ->get();
     
             
            $status=DB::table('status')
            ->select('ID_TT', 'TEN_TT')
            ->get();
            $tinhtrang=DB::table('tinhtrangxe')
            ->select('ID_TTX','TenTTX')
            ->get();

            $quanhuyen=DB::table('quanhuyen')
            ->get();

            $pageView7 = DB::table('page_views')->where('IDP',7)->first();

            if ($pageView7 === null) {
                
                DB::table('page_views')->insert(['views' => 1]);
            } else {
               
                DB::table('page_views')->where('IDP', $pageView7->IDP)->increment('views');
            }
                
            return view('pages.search_menu',['pageView7'=>$pageView7,'quanhuyen'=>$quanhuyen,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'status'=>$status,'allcategorynews'=> $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
        }
         
       
}