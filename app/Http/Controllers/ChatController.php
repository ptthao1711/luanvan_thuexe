<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ChatController extends Controller{
    public function chat_home(Request $request){
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

         $pageView3 = DB::table('page_views')->where('IDP',3)->first();

         if ($pageView3 === null) {
             // Tạo bản ghi đầu tiên nếu chưa có
             DB::table('page_views')->insert(['views' => 1]);
         } else {
             // Tăng lượt truy cập lên 1 nếu đã có bản ghi
             DB::table('page_views')->where('IDP', $pageView3->IDP)->increment('views');
         }

         $conversations=DB::table('conversations')
         ->where('IDTK1',$idTK)
         ->orWhere('IDTK2',$idTK) 
         ->get()
         ->map(function ($conversation) use ($idTK) {
            $otherUserId = $conversation->IDTK1 == $idTK ? $conversation->IDTK2 : $conversation->IDTK1;
            
            $otherUser = DB::table('taikhoan_sinhvien')->where('IDTK', $otherUserId)->first();
            
            return [
                'ID_HT' => $conversation->ID_HT,
                'created_at' => $conversation->created_at,
                'other_user' => [
                    'IDTK' => $otherUser->IDTK,
                    'HOTEN' => $otherUser->HOTEN,
                    'EMAIL' => $otherUser->EMAIL,
                    'avt' => $otherUser->avt,
                    'trangthaihoatdong' => $otherUser->trangthaihoatdong,
                ],
            ];
        });
        
         
         
         return view('pages.chat_home',['pageView3'=>$pageView3,'conversations'=>$conversations,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
       
     }
    

    //-------------------------------------------------------------------------------------------------------------------------------------

    public function header(Request $request){
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

         $conversations=DB::table('conversations')
         ->where('IDTK1',$idTK)
         ->orWhere('IDTK2',$idTK) 
         ->get()
         ->map(function ($conversation) use ($idTK) {
          
            $otherUserId = $conversation->IDTK1 == $idTK ? $conversation->IDTK2 : $conversation->IDTK1;
                     
            $otherUser = DB::table('taikhoan_sinhvien')->where('IDTK', $otherUserId)->first();
            
            return [
                'ID_HT' => $conversation->ID_HT,
                'created_at' => $conversation->created_at,
                'other_user' => [
                    'IDTK' => $otherUser->IDTK,
                    'HOTEN' => $otherUser->HOTEN,
                    'EMAIL' => $otherUser->EMAIL,
                    'avt' => $otherUser->avt,
                    'trangthaihoatdong' => $otherUser->trangthaihoatdong,
                ],
            ];
        });
        
         
         
         return view('pages.chat',['conversations'=>$conversations,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
       
     }

     public function showmess($ID_HT){
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

         $conversations=DB::table('conversations')
         ->where('IDTK1',$idTK)
         ->orWhere('IDTK2',$idTK) 
         ->get()
         ->map(function ($conversation) use ($idTK) {
           
            $otherUserId = $conversation->IDTK1 == $idTK ? $conversation->IDTK2 : $conversation->IDTK1;
            
            $otherUser = DB::table('taikhoan_sinhvien')->where('IDTK', $otherUserId)->first();
            
            return [
                'ID_HT' => $conversation->ID_HT,
                'created_at' => $conversation->created_at,
                'other_user' => [
                    'IDTK' => $otherUser->IDTK,
                    'HOTEN' => $otherUser->HOTEN,
                    'EMAIL' => $otherUser->EMAIL,
                    'avt' => $otherUser->avt,
                    'trangthaihoatdong' => $otherUser->trangthaihoatdong,
                ],
            ];
        });

        $showmess=DB::table('messages')
        ->where('ID_HT',$ID_HT)
        ->orderBy('timestamp', 'asc') // Sắp xếp theo timestamp từ cũ đến mới
        ->get();

        $showavt = DB::table('conversations')
        ->join('taikhoan_sinhvien', function($join) {
            $join->on('taikhoan_sinhvien.IDTK', '=', 'conversations.IDTK1')
                ->orOn('taikhoan_sinhvien.IDTK', '=', 'conversations.IDTK2');
        })
        ->where('conversations.ID_HT', $ID_HT)
        ->where('taikhoan_sinhvien.IDTK', '!=', $idTK)
        ->select('taikhoan_sinhvien.avt','taikhoan_sinhvien.HOTEN','taikhoan_sinhvien.trangthaihoatdong')
        ->get();

         

         return view('pages.chat',['showavt'=>$showavt,'showmess'=>$showmess,'ID_HT' => $ID_HT,'conversations'=>$conversations,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
       

     }
     public function send(Request $request,$ID_HT){
        $send=$request->input('send');
        $idTK = Session::get('IDTK');
        DB::table('messages')
        ->insert([
            'ID_HT'=>$ID_HT,
            'IDTK' =>$idTK,
            'content'=>$send,
            'timestamp' => Carbon::now(), 
        ]);
        
        return redirect()->back();
     }
//---------------------------------------------------------------------------------------------------------------------------------------------------

public function chatwith(Request $request) {
    $idTK = Session::get('IDTK'); 
    $idTK2 = $request->input('IDTK'); 
    if (empty($idTK2)) {
        return redirect()->back()->with('error', 'Không tìm thấy ID người nhận.');
    }

    $getconvs = DB::table('conversations')
        ->where(function ($query) use ($idTK, $idTK2) {
            $query->where('IDTK1', '=', $idTK)
                  ->where('IDTK2', '=', $idTK2);
        })
        ->orWhere(function ($query) use ($idTK, $idTK2) {
            $query->where('IDTK1', '=', $idTK2)
                  ->where('IDTK2', '=', $idTK);
        })
        ->first();

    if ($getconvs === null) {
        $newConvID = DB::table('conversations')
            ->insertGetId([
                'IDTK1' => $idTK,
                'IDTK2' => $idTK2,
                'created_at' => Carbon::now()
                
            ]);
            

        return  redirect()->route('chat', ['ID_HT' => $newConvID]);
    } else {
        
        return redirect()->route('chat', ['ID_HT' => $getconvs->ID_HT]);
    }
}


// delete hội thoại-----------------
public function delete_chat(Request $request, $ID_HT){
    $delete_chat=DB::table('conversations')
    ->where('ID_HT',$ID_HT)
    ->delete();

    if ($delete_chat) {  
        return redirect()->route('chatt')->with('success', 'Đã xóa thành công.');  
    } else {  
        return redirect()->route('chatt')->with('error', 'Không thể xóa hộp thoại');  
    }

}


}