<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

use Session; // dùng để  lưu tạm các message sau khi thực hiện một công việc gì đó.
use App\Http\Requests; // dùng để lấy dữ liệu từ form
use Illuminate\Support\Facades\Redirect; // dùng để chuyển hướng
use function Laravel\Prompts\select;

session_start();


class CategoryController extends Controller
{
    
    public function viewCategories(Request $request){
       $idTK = Session::get('IDTK');
       
          
       $countlikes=DB::table('likes')
       ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK' , '=','likes.IDTK')
       ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
       ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
       ->where('taikhoan_sinhvien.IDTK', $idTK)
       ->select('taikhoan_sinhvien.IDTK','likes.ID_LIKE','tinthuexe.ID_TIN')
       ->orderBy('taikhoan_sinhvien.IDTK')
       ->get();
       $count=count($countlikes);
      

      
       $allcategorynews = DB::table('xe')
       ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
       ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
       ->leftJoin('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->select('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE',DB::raw('COUNT(orders.ID_ORDER) as total_rent'),DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
       //->where('tinthuexe.IDTTT','=','2')
       ->groupBy('tinthuexe.TIEUDE','phuongxa.ten_phuong_xa','tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
       ->orderBy('tinthuexe.timepost','DESC')
       ->get();
       
     

       
       $getlike_user = DB::table('likes')  
        ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
        ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
        ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('taikhoan_sinhvien.IDTK', $idTK)  
        ->select('tinthuexe.IDTK','thuoc_like.ID_TIN','thuoc_like.time_add','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
        ->groupBy('tinthuexe.IDTK','thuoc_like.ID_TIN','thuoc_like.time_add', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE','tinthuexe.timepost')  
        ->orderBy('thuoc_like.time_add', 'desc')  
        ->get();
    
        
        $getsearch=DB::table('search')
        ->select('search.IDTK','search.WORD','search.IDS')
        ->where( 'search.IDTK',$idTK)
        ->orderBy('search.IDTK')
        ->get();

        $loaixe=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->where('ID_LOAI', '<>', 1)
        ->get();

        
        $tinhtrang=DB::table('tinhtrangxe')
        ->select('ID_TTX','TenTTX')
        ->get();
        
        $quanhuyen=DB::table('quanhuyen')
        ->get();



        $pageView = DB::table('page_views')->where('IDP',1)->first();

        if ($pageView === null) {      
            DB::table('page_views')->insert(['views' => 1]);
        } else {
           
            DB::table('page_views')->where('IDP', $pageView->IDP)->increment('views');
        }


        session(['loaixe'=>$loaixe,'countlikes'=>$countlikes,'allcategorynews' => $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
        
        return view('home',['quanhuyen'=>$quanhuyen,'pageView' => $pageView,'tinhtrang'=>$tinhtrang,'loaixe'=>$loaixe,'allcategorynews' => $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
      
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
   
        public function deletelikes($id_TIN){
            $deleted = DB::table('thuoc_like')  
            ->where('ID_TIN', $id_TIN)  
            ->delete();  

   
         session(['deleted' => $deleted]);  

   
        if ($deleted) {  
        
         return redirect()->route('home')->with('success', 'Tin lưu đã xóa.');  
         } else {  
       
         return redirect()->route('home')->with('error', 'Không tìm thấy bản ghi nào để xóa.');  
        }  
           
            
        }

        public function deletelstk(){
            $idTK = Session::get('IDTK');   
        
            $deleted_search = DB::table('search')
            ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','search.IDTK')
            ->where('search.IDTK', $idTK)
            ->delete();  
        
            if ($deleted_search) {  
                return redirect()->route('home')->with('success', 'Đã xóa.');  
            } else {  
                return redirect()->route('home')->with('error', 'Không có bản ghi nào để xóa.');  
            }
                
                
        }
        
            
    

        
}
