<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session; 

class ReviewController extends Controller{
     public function header(){
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
       
       $getlike_user = DB::table('likes')  
        ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
        ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
        ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('taikhoan_sinhvien.IDTK', $idTK)  
        ->select('tinthuexe.IDTK','thuoc_like.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
        ->groupBy('tinthuexe.IDTK','thuoc_like.ID_TIN', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE','tinthuexe.timepost')  
        ->orderBy('tinthuexe.IDTK')  
        ->get();
    
        
        $getsearch=DB::table('search')
        ->select('search.IDTK','search.WORD','search.IDS')
        ->where( 'search.IDTK',$idTK)
        ->orderBy('search.IDTK')
        ->get();

        
        return view('pages.detail_danhgia',['getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
      
     }
    
}