<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\OrderThankYouMail;
use Illuminate\Support\Facades\Mail;


use Session; // dùng để  lưu tạm các message sau khi thực hiện một công việc gì đó.

session_start();
class DetailController extends Controller{
    public function header($id_tin){

         $idTK = Session::get('IDTK');
          
         $countlikes=DB::table('likes')
         ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
         ->where('likes.IDTK', $idTK)
         ->select('likes.IDTK','likes.ID_LIKE','tinthuexe.ID_TIN')
         ->orderBy('likes.IDTK')
         ->get();
         $count=count($countlikes);

         $getlike_byuser = DB::table('likes')  
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
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
        ->select('search.IDTK','search.WORD')
        ->where( 'search.IDTK',$idTK)
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        
        $detail_new = DB::table('xe')  
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','xe.IDTK')
        // ->join('messages','messages.IDTK','=','taikhoan_sinhvien.IDTK')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->join('tinthuexe', 'tinthuexe.ID_XE', '=', 'xe.ID_XE')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA') 
        ->join('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen') 
        ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
        ->where('tinthuexe.ID_TIN', $id_tin)  
        ->select('tinthuexe.TIEUDE','tinthuexe.IDTK','quanhuyen.ten_quan_huyen','phuongxa.ten_phuong_xa','tinthuexe.TGTHUE','tinthuexe.TGTRA','taikhoan_sinhvien.IDTK',
        'taikhoan_sinhvien.trangthaihoatdong','taikhoan_sinhvien.avt','tinthuexe.ID_TIN','taikhoan_sinhvien.HOTEN','taikhoan_sinhvien.SDT','tinhtrangxe.TenTTX', 'tinthuexe.THONGTIN','tinthuexe.PRICE',
         DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),DB::raw('MAX(image.DUONGDAN) as DUONGDAN1'), 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->groupBy('tinthuexe.TIEUDE','tinthuexe.IDTK','quanhuyen.ten_quan_huyen','phuongxa.ten_phuong_xa','tinthuexe.TGTHUE','tinthuexe.TGTRA','taikhoan_sinhvien.IDTK',
        'taikhoan_sinhvien.trangthaihoatdong','taikhoan_sinhvien.avt','tinthuexe.ID_TIN','taikhoan_sinhvien.HOTEN','taikhoan_sinhvien.SDT','tinhtrangxe.TenTTX', 'tinthuexe.THONGTIN','tinthuexe.PRICE', 
        'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->first(); 
        

        
        $fullAddress =$detail_new->VITRI . ',' . $detail_new->ten_phuong_xa . ', ' . $detail_new->ten_quan_huyen .','. 'Cần Thơ';
        //dd($fullAddress);

        $danhgia_tin = DB::table('tinthuexe')
        ->join('danhgia_thuexe','danhgia_thuexe.ID_TIN','=','tinthuexe.ID_TIN')
        ->where('tinthuexe.ID_TIN','=',$id_tin)
        ->select('tinthuexe.ID_TIN','danhgia_thuexe.MUCDO')
        ->orderBy('tinthuexe.ID_TIN')
        ->first();

        $danhgiatin = DB::table('tinthuexe')
        ->join('danhgia_thuexe','danhgia_thuexe.ID_TIN','=','tinthuexe.ID_TIN')
        ->where('tinthuexe.ID_TIN','=',$id_tin)
        ->select('tinthuexe.ID_TIN','danhgia_thuexe.MUCDO')
        ->orderBy('tinthuexe.ID_TIN')
        ->get();

        $count_tin= count($danhgiatin);
        

        $countnewby=DB::table('tinthuexe')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','tinthuexe.IDTK')
        ->where('taikhoan_sinhvien.IDTK','=',$detail_new->IDTK)
        ->select('tinthuexe.ID_TIN')
        ->get();
        $countnews=count($countnewby);

        $showdg=DB::table('danhgia_thuexe')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','danhgia_thuexe.ID_TIN')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','danhgia_thuexe.IDTK')
        ->where('tinthuexe.ID_TIN',$id_tin)
        ->select('taikhoan_sinhvien.avt','taikhoan_sinhvien.HOTEN','danhgia_thuexe.TIME','danhgia_thuexe.MUCDO','danhgia_thuexe.BINHLUAN','danhgia_thuexe.ANHDG')
        ->get();
         
        $avgmucdo=round(DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->avg('MUCDO'),1);

        $nam=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->where('MUCDO','=',5)
        ->get();
        $bon=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->where('MUCDO','=',4)
        ->get();
        $ba=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->where('MUCDO','=',3)
        ->get();
        $hai=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->where('MUCDO','=',2)
        ->get();
        $mot=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->where('MUCDO','=',1)
        ->get();
        $namsao= count($nam);
        $bonsao= count($bon);
        $basao= count($ba);
        $haisao= count($hai);
        $motsao= count($mot);

        $binhluan=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->whereNotNull('BINHLUAN')
        ->get();
        $getbl=count($binhluan);

        $hinhanh=DB::table('danhgia_thuexe')
        ->where('ID_TIN',$id_tin)
        ->whereNotNull('anhdg')
        ->get();
        $countanh=count($hinhanh);

        $pttt = DB::table('phuongthuc_tt')
        ->get();

        

        // Lấy các ngày đã thuê từ các đơn hàng
        $rentedDates = DB::table('orders')
            ->where('ID_TIN', $id_tin)
            ->whereIn('ID_TT', [1, 2, 3, 4]) // Trạng thái đã thuê
            ->select('TGTHUE', 'TGTRA') // Cột ngày thuê và trả
            ->get();

        // Tạo danh sách các ngày đã thuê
        $blockedDates = [];
        foreach ($rentedDates as $rented) {
            $startDate = strtotime($rented->TGTHUE);
            $endDate = strtotime($rented->TGTRA);
            for ($i = $startDate; $i <= $endDate; $i += 86400) { // Lặp qua từng ngày
                $blockedDates[] = date('Y-m-d', $i);
            }
        }
         
        //dd($blockedDates);

        
        $pageView4 = DB::table('page_views')->where('IDP',4)->first();

        if ($pageView4 === null) {
            DB::table('page_views')->insert(['views' => 1]);
        } else {
            
            DB::table('page_views')->where('IDP', $pageView4->IDP)->increment('views');
        }


        return view('pages.detail_new',['pageView4'=>$pageView4,'blockedDates'=>$blockedDates,'pttt'=>$pttt,'avgmucdo'=>$avgmucdo,'showdg'=>$showdg,'fullAddress'=>$fullAddress,'countnews'=>$countnews,
        'count_tin'=>$count_tin,'danhgia_tin' => $danhgia_tin,'detail_new' => $detail_new,'getlike_byuser' => $getlike_byuser,'getsearch'=>$getsearch,
        'countanh'=>$countanh,'getbl'=>$getbl,'motsao'=>$motsao,'haisao'=>$haisao,'basao'=>$basao,'bonsao'=>$bonsao,'namsao'=>$namsao,'count'=>$count]);
      

    }


public function addlike($id_tin) {  
    $idTK = Session::get('IDTK');  
   
    $like = DB::table('likes')
        ->where('IDTK', $idTK)
        ->first(); 

    if ($like) {
      
        $existingLike = DB::table('thuoc_like')
            ->where('ID_LIKE', $like->ID_LIKE)
            ->where('ID_TIN', $id_tin)
            ->first();

        if (!$existingLike) {
            
            $addlike = DB::table('thuoc_like')->insert([
                'ID_LIKE' => $like->ID_LIKE,  
                'ID_TIN' => $id_tin  
            ]);

            
            if ($addlike) {
                return redirect()->back()->with('success', 'Tin đã được lưu !');  
            } else {
                return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu tin!');  
            }
        } else {
           
            return redirect()->back()->with('error', 'Tin này đã được lưu trước đó!');  
        }
    } else {
        
        return redirect()->back()->with('error', 'Đăng nhập để lưu tin!');  
    }
}

    public function deletelikes($like_id){
        $deleted=DB::table('thuoc_like')
        ->where('ID_LIKE', $like_id)->delete();
        if ($deleted) {  
           
            return redirect()->route('order_buy')->with('success', 'Tin lưu đã xóa.');  
        } else {  
        
            return redirect()->route('order_buy')->with('error', 'Like not found.');  
        }  
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    public function addorders(Request $request,$id_tin){
        $idTK = Session::get('IDTK');
        $email = Session::get('EMAIL');

        $blockedDates = DB::table('orders')
        ->where('ID_TIN', $id_tin)
        ->whereIn('ID_TT', [1, 2, 3, 4]) 
        ->pluck('TGTHUE', 'TGTRA') 
        ->toArray();

        $tgthue = $request->ngay_thue;
        $tgtra = $request->ngay_tra;

        foreach ($blockedDates as $start => $end) {
            if (
                ($tgthue >= $start && $tgthue <= $end) || // Ngày bắt đầu nằm trong khoảng
                ($tgtra >= $start && $tgtra <= $end) || // Ngày kết thúc nằm trong khoảng
                ($tgthue <= $start && $tgtra >= $end)   // Khoảng thời gian bao trùm toàn bộ
            ) {
                return redirect()->back()->with('error', 'Khoảng thời gian đã có ngày bị thuê. Vui lòng chọn lại.');
            }
        }

        $orderloinhan = $request->loinhan;
        $tgthue = $request ->ngay_thue;
        $tgtra = $request ->ngay_tra;
        $pttt= $request->pptt;
        $total= $request ->input('total_price');
        $result = DB::table('orders')->insert([
            'IDTK' => $idTK,
            'ID_TIN' => $id_tin,
            'LOINHAN' => $orderloinhan,
            'TGTHUE'=>$tgthue,
            'TGTRA'=>$tgtra,
            'TOTAL' =>$total,
            'ID_PTTT' =>$pttt
        ]);
    
        if ($result) {
           
            $orderID = DB::getPdo()->lastInsertId();

            Mail::raw("Cảm ơn bạn đã thuê xe tại CTRent.
Đơn thuê xe của bạn đã được nhận và đang chờ xác nhận.
Mã đơn thuê xe của bạn là: CTRENT " . $orderID ."
Tổng số tiền: " . number_format($total, 0, ',', '.') . " VNĐ. ",
                 function ($message) use ($email) {
                $message->to($email)
                        ->subject('Cảm ơn bạn đã đặt thuê xe trên hệ thống Can Tho Rental');
            });

             
        return redirect()->route('thanks');
        }
}

public function detail_order(Request $request, $ID_ORDER){
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

         $showorder = DB::table('orders')
         ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','orders.IDTK')
         ->join('phuongthuc_tt','phuongthuc_tt.ID_PPTT','=','orders.ID_PTTT')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
         ->join('image', 'image.ID_XE', '=', 'xe.ID_XE') 
         ->where('orders.ID_ORDER',$ID_ORDER)
         ->select('orders.LOINHAN','tinthuexe.ID_TIN','taikhoan_sinhvien.EMAIL','orders.ID_TT','orders.ttgiaodich','orders.TGTHUE','orders.TGTRA','orders.TOTAL',DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.PRICE','orders.ID_ORDER','tinthuexe.TIEUDE','phuongthuc_tt.TEN_PPTT')
         ->groupBy('orders.LOINHAN','tinthuexe.ID_TIN','taikhoan_sinhvien.EMAIL','orders.ID_TT','orders.ttgiaodich','orders.TGTHUE','orders.TGTRA','orders.TOTAL','tinthuexe.PRICE','orders.ID_ORDER','tinthuexe.TIEUDE','phuongthuc_tt.TEN_PPTT',)
         ->orderBy('orders.ID_ORDER')
         ->get();

         $lydohuy = DB::table('lydohuy')
         ->where('ID_ORDER',$ID_ORDER)
         ->get();

         //dd($showorder);
         return view('pages.detail_order',['lydohuy'=>$lydohuy,'showorder'=>$showorder,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);

}



public function detail_order_buy(Request $request, $ID_ORDER){
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

     $showorder = DB::table('orders')
     ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','orders.IDTK')
     ->join('phuongthuc_tt','phuongthuc_tt.ID_PPTT','=','orders.ID_PTTT')
     ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
     ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
     ->join('image', 'image.ID_XE', '=', 'xe.ID_XE') 
     ->where('orders.ID_ORDER',$ID_ORDER)
     ->select('orders.LOINHAN','tinthuexe.ID_TIN','taikhoan_sinhvien.EMAIL','orders.ID_TT','orders.ttgiaodich','orders.TGTHUE','orders.TGTRA','orders.TOTAL',DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.PRICE','orders.ID_ORDER','tinthuexe.TIEUDE','phuongthuc_tt.TEN_PPTT')
     ->groupBy('orders.LOINHAN','tinthuexe.ID_TIN','taikhoan_sinhvien.EMAIL','orders.ID_TT','orders.ttgiaodich','orders.TGTHUE','orders.TGTRA','orders.TOTAL','tinthuexe.PRICE','orders.ID_ORDER','tinthuexe.TIEUDE','phuongthuc_tt.TEN_PPTT',)
     ->orderBy('orders.ID_ORDER')
     ->get();

     $lydohuy = DB::table('lydohuy')
     ->where('ID_ORDER',$ID_ORDER)
     ->get();

     //dd($showorder);
     return view('pages.detail_order_buy',['lydohuy'=>$lydohuy,'showorder'=>$showorder,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);

}




}
