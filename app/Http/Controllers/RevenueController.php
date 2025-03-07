<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\UserController;

use Session;

class RevenueController extends Controller{
    public function showtaichinh( Request $request){
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

         $tienrut = $request->input('tien_rut'); // Số tiền cần rút
         $revenue = DB::table('orders')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->where('tinthuexe.IDTK','=',$idTK)
         ->where('orders.ID_TT',[3,4])
         ->sum('orders.TOTAL');

         $countorrder= DB::table('orders')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->where('tinthuexe.IDTK','=',$idTK)
         ->count('orders.ID_ORDER');

         $counthoanthanh= DB::table('orders')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->where('tinthuexe.IDTK','=',$idTK)
         ->where('orders.ID_TT',[3,4])
         ->count('orders.ID_ORDER');

         
         $revenue_online = DB::table('orders')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->where('tinthuexe.IDTK','=',$idTK)
         ->where('orders.ID_PTTT',2)
         ->where('orders.ID_TT',[3,4])
         ->sum('orders.TOTAL');

         $revenue_live = DB::table('orders')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->where('tinthuexe.IDTK','=',$idTK)
         ->where('orders.ID_PTTT',1)
         ->where('orders.ID_TT',[3,4])
         ->sum('orders.TOTAL');

        // dd($revenue_online);

        $giaodich = DB::table('giaodich')
        ->where('IDTK',$idTK)
        ->get();

        $lichsugiaodich = DB::table('lichsuthanhtoan')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','lichsuthanhtoan.IDTK')
        ->where('lichsuthanhtoan.IDTK',$idTK)
        ->get();
    
         
         // Kiểm tra số dư đủ để rút
        
    
         return view('pages.taichinh',['lichsugiaodich'=>$lichsugiaodich,'counthoanthanh'=>$counthoanthanh,'giaodich'=>$giaodich,'revenue_live'=>$revenue_live,'revenue_online'=>$revenue_online,'countorrder'=>$countorrder,'revenue'=>$revenue,'count'=>$count, 'getlike_user'=>$getlike_user, 'getsearch'=>$getsearch]);

    }

    public function addbank(Request $request){
        
        $idTK = Session::get('IDTK');
         
        $taikhoan = DB::table('thongtintaikhoan')
        ->where('IDTK', $idTK)
        ->where('TRANGTHAI', 1)
        ->exists();

        if ($taikhoan) {
            
            return redirect()->back()->with('error', 'Bạn đang có giao dịch chờ xử lý. Không thể yêu cầu mới.');
        }

        $bank = $request->input('bank');
        $name = $request->input('name');
        $stk = $request->input('stk');
        $price = $request->input('price');
        DB::table('thongtintaikhoan')
         ->insert([
            'IDTK' => $idTK,
            'BANK'=>$bank,
            'NAME'=>$name,
            'STK' =>$stk,
            'MONEY'=>$price
         ]);

        return redirect()->back()->with('success', 'Thông tin ngân hàng đã được thêm và số dư đã được cập nhật!');

    }

    
}