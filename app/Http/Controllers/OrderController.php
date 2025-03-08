<?php

namespace App\Http\Controllers;
use PDF;
use Carbon\Carbon;
use Exception;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderThankYouMail;
use Session;


session_start();
class OrderController extends Controller{
    public function header(Request $request){

         $idTK = Session::get('IDTK');
        // dd($idTK);
          
         $countlikes=DB::table('likes')
         ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
         ->where('likes.IDTK', $idTK)
         ->select('likes.IDTK','likes.ID_LIKE','tinthuexe.ID_TIN')
         ->orderBy('likes.IDTK')
         ->get();
         $count=count($countlikes);

         $getlike_byuser = session('getlike_user');
         
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
        ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
        ->select('search.IDTK','search.WORD')
        ->where( 'search.IDTK',$idTK)
        ->orderBy('taikhoan_sinhvien.IDTK')
        ->get();
        $status = DB::table('status')
        ->select('ID_TT','TEN_TT')
        ->get();

        $orderbyidtk=DB::table('orders')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','tinthuexe.IDTK')
        ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->join('status','status.ID_TT','=','orders.ID_TT')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->where('orders.IDTK',$idTK)
        ->select('orders.ID_ORDER','orders.timepost','orders.TGTRA','taikhoan_sinhvien.EMAIL','tinthuexe.IDTK','orders.ID_PTTT','orders.TOTAL','tinthuexe.timepost','tinhtrangxe.TenTTX','orders.ID_TT','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN','tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.VITRI', 'tinthuexe.ID_TIN')
        ->groupBy('orders.ID_ORDER','orders.timepost','orders.TGTRA','taikhoan_sinhvien.EMAIL','tinthuexe.IDTK','orders.ID_PTTT','orders.TOTAL','tinthuexe.timepost','tinhtrangxe.TenTTX','orders.ID_TT','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN', 'tinthuexe.PRICE',  'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->orderBy('orders.timepost','desc')
        ->get();

        $showdg=DB::table('tieuchi_dvthue')
       ->select('ID_TCT','TENTIEUCHI')
       ->get();

       $pageView5 = DB::table('page_views')->where('IDP',5)->first();

       if ($pageView5 === null) {
           DB::table('page_views')->insert(['views' => 1]);
       } else {       
           DB::table('page_views')->where('IDP', $pageView5->IDP)->increment('views');
       } 
       
        return view('pages.order_buy',['pageView5'=>$pageView5,'showdg'=>$showdg,'status'=>$status,'getlike_user'=>$getlike_user,'orderbyidtk'=>$orderbyidtk,'getlike_byuser' => $getlike_byuser,'getsearch'=>$getsearch,'count'=>$count]);
      

    }


    
    public function orderbyid($id_status){

        $idTK = Session::get('IDTK');
       // dd($idTK);
         
        $countlikes=DB::table('likes')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('likes.IDTK', $idTK)
        ->select('likes.IDTK','likes.ID_LIKE','tinthuexe.ID_TIN')
        ->orderBy('likes.IDTK')
        ->get();
        $count=count($countlikes);

        $getlike_byuser = session('getlike_user');
        
      $getlike_user = DB::table('likes')  
      ->join('thuoc_like', 'thuoc_like.ID_LIKE', '=', 'likes.ID_LIKE')  
      ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK', '=', 'likes.IDTK')  
      ->join('tinthuexe', 'tinthuexe.ID_TIN', '=', 'thuoc_like.ID_TIN')  
      ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
      ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
      ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
      ->where('taikhoan_sinhvien.IDTK', $idTK)  
      ->select('tinthuexe.IDTK','tinhtrangxe.TenTTX','thuoc_like.ID_TIN','tinthuexe.timepost', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'), 'likes.ID_LIKE')  
      ->groupBy('tinthuexe.IDTK','tinhtrangxe.TenTTX','thuoc_like.ID_TIN', 'tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'likes.ID_LIKE','tinthuexe.timepost')  
      ->orderBy('tinthuexe.IDTK')  
      ->get();
  

       
       $getsearch=DB::table('search')
       ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
       ->select('search.IDTK','search.WORD')
       ->where( 'search.IDTK',$idTK)
       ->orderBy('taikhoan_sinhvien.IDTK')
       ->get();
       $status = DB::table('status')
       ->select('ID_TT','TEN_TT')
       ->get();

       $orderbyidtk=DB::table('orders')
       ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
       ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','tinthuexe.IDTK')
       ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
       ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->join('status','status.ID_TT','=','orders.ID_TT')
       ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
       ->where('orders.IDTK',$idTK)
       ->where('orders.ID_TT',$id_status)
       ->select('orders.ID_ORDER','orders.timepost','orders.TGTRA','taikhoan_sinhvien.EMAIL','tinthuexe.IDTK','orders.TOTAL','tinthuexe.timepost','orders.ID_PTTT','orders.ID_TT','tinhtrangxe.TenTTX','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN','tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.VITRI', 'tinthuexe.ID_TIN')
       ->groupBy('orders.ID_ORDER','orders.timepost','orders.TGTRA','taikhoan_sinhvien.EMAIL','tinthuexe.IDTK','orders.TOTAL','tinthuexe.timepost','orders.ID_PTTT','orders.ID_TT','tinhtrangxe.TenTTX','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN', 'tinthuexe.PRICE',  'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
       ->orderBy('orders.timepost','desc')
       ->get();

       $showdg=DB::table('tieuchi_dvthue')
       ->select('ID_TCT','TENTIEUCHI')
       ->get();

       
      
       return view('pages.order_buy',['showdg'=>$showdg,'status'=>$status,'getlike_user'=>$getlike_user,'orderbyidtk'=>$orderbyidtk,'getlike_byuser' => $getlike_byuser,'getsearch'=>$getsearch,'count'=>$count]);
    
   }
//    ---------------------------------------------------------------------------------------------------------

   public function adddg(Request $request,$ID_TIN){

    try {
       
        $idTK = session::get('IDTK');
        
        if ($request->hasFile('image')) {
           
            $image = $request->file('image');
            
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('images/danhgia'), $imageName);
            
            $path = 'images/danhgia/' . $imageName;
              
            $data = array();
            $data['IDTK'] = $idTK;
            $data['ID_TIN'] = $ID_TIN;
            $data['MUCDO'] = $request->mssv;
            $data['BINHLUAN'] = $request->khoa;
            $data['THAIDOPV'] = $request->ngaysinh;
            $data['anhdg'] = $path; 

            $edit_profile = DB::table('taikhoan_sinhvien')
                ->where('IDTK', $idTK) 
                ->update($data);

            if ($edit_profile) {
                return redirect()->back()->with('success', 'Cập nhật thành công!');
            } else {
                return redirect()->back()->with('error', 'Đã xảy ra lỗi trong quá trình cập nhật!');
            }
        } else {
            throw new Exception('Image upload failed');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
      

   }


public function addlike($id_tin, $id_like) {  
    $idTK = Session::get('IDTK');   
    $addlike = DB::table('thuoc_like')
        ->join('likes','likes.ID_LIKE','=','thuoc_like.ID_LIKE')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','likes.IDTK')
        ->where('taikhoan_sinhvien.IDTK',$idTK)
        ->insert([  
            'ID_LIKE' => $id_like,  
            'ID_TIN' => $id_tin  
        ]);    
    
    if($addlike) {  
        return redirect()->route('pages.detail_new', ['id' => $id_tin])->with('success', 'Bạn đã thêm lượt thích thành công!');  
    } else {  
        return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');  
    }  
}

    public function deletelikes($like_id){
        $deleted=DB::table('thuoc_like')
        ->where('ID_LIKE', $like_id)->delete();
        if ($deleted) {    
            return redirect()->route('order_buy')->with('success', 'Tin lưu đã xóa.');  
        } else {   
            return redirect()->route( 'order_buy')->with('error', 'Like not found.');  
        }  
    }




    public function ordersell(Request $request){

        $idTK = Session::get('IDTK');
       // dd($idTK);
         
        $countlikes=DB::table('likes')
        ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
        ->where('likes.IDTK', $idTK)
        ->select('likes.IDTK','likes.ID_LIKE','tinthuexe.ID_TIN')
        ->orderBy('likes.IDTK')
        ->get();
        $count=count($countlikes);

        $getlike_byuser = session('getlike_user');
        
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
       ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
       ->select('search.IDTK','search.WORD')
       ->where( 'search.IDTK',$idTK)
       ->orderBy('taikhoan_sinhvien.IDTK')
       ->get();
       $status = DB::table('status')
       ->select('ID_TT','TEN_TT')
       ->get();

       $orderbyidtk=DB::table('orders')
       ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
       ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','orders.IDTK')
       ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
       ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->join('status','status.ID_TT','=','orders.ID_TT')
       ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
       ->where('tinthuexe.IDTK',$idTK)
       ->select('orders.ID_ORDER','orders.timepost','taikhoan_sinhvien.EMAIL','orders.IDTK','orders.TOTAL','tinthuexe.timepost','orders.ID_TT','tinhtrangxe.TenTTX','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN','tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.VITRI', 'tinthuexe.ID_TIN')
       ->groupBy('orders.ID_ORDER','orders.timepost','taikhoan_sinhvien.EMAIL','orders.IDTK','orders.TOTAL','tinthuexe.timepost','orders.ID_TT','tinhtrangxe.TenTTX','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN', 'tinthuexe.PRICE',  'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
       ->orderBy('orders.timepost','desc')
       ->get();

       $pageView6 = DB::table('page_views')->where('IDP',6)->first();

       if ($pageView6 === null) {
           DB::table('page_views')->insert(['views' => 1]);
       } else {       
           DB::table('page_views')->where('IDP', $pageView6->IDP)->increment('views');
       }

       $showdg=DB::table('tieuchi_ngthue')
       ->select('STT','TENTC')
       ->get();

       
      
       return view('pages.order_sell',['showdg'=>$showdg,'pageView6'=>$pageView6,'status'=>$status,'getlike_user'=>$getlike_user,'orderbyidtk'=>$orderbyidtk,'getlike_byuser' => $getlike_byuser,'getsearch'=>$getsearch,'count'=>$count]);
     

   }

   public function ordersell_bytt($id_status){

    $idTK = Session::get('IDTK');
   // dd($idTK);
     
    $countlikes=DB::table('likes')
    ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
    ->join('tinthuexe','tinthuexe.ID_TIN','=','thuoc_like.ID_TIN')
    ->where('likes.IDTK', $idTK)
    ->select('likes.IDTK','likes.ID_LIKE','tinthuexe.ID_TIN')
    ->orderBy('likes.IDTK')
    ->get();
    $count=count($countlikes);

    $getlike_byuser = session('getlike_user');
    
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
   ->join('taikhoan_sinhvien', 'taikhoan_sinhvien.IDTK','=','search.IDTK')
   ->select('search.IDTK','search.WORD')
   ->where( 'search.IDTK',$idTK)
   ->orderBy('taikhoan_sinhvien.IDTK')
   ->get();

   $status = DB::table('status')
   ->select('ID_TT','TEN_TT')
   ->get();

   $orderbyidtk=DB::table('orders')
   ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
   ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','orders.IDTK')
   ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
   ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
   ->join('image','image.ID_XE','=','xe.ID_XE')
   ->join('status','status.ID_TT','=','orders.ID_TT')
   ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
   ->where('tinthuexe.IDTK',$idTK)
   ->where('orders.ID_TT',$id_status)
   ->select('orders.ID_ORDER','orders.timepost','taikhoan_sinhvien.EMAIL','orders.IDTK','orders.TOTAL','tinthuexe.timepost','orders.ID_TT','tinhtrangxe.TenTTX','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN','tinthuexe.PRICE', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.VITRI', 'tinthuexe.ID_TIN')
   ->groupBy('orders.ID_ORDER','orders.timepost','taikhoan_sinhvien.EMAIL','orders.IDTK','orders.TOTAL','tinthuexe.timepost','orders.ID_TT','tinhtrangxe.TenTTX','taikhoan_sinhvien.avt','loaixe.TEN_LOAI','taikhoan_sinhvien.HOTEN','tinthuexe.TIEUDE', 'tinthuexe.THONGTIN', 'tinthuexe.PRICE',  'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
   ->orderBy('orders.timepost','desc')
   ->get();
   //d($orderbyidtk);

   $showdg=DB::table('tieuchi_ngthue')
   ->select('STT','TENTC')
   ->get();


  
   return view('pages.order_sell',['showdg'=>$showdg,'status'=>$status,'getlike_user'=>$getlike_user,'orderbyidtk'=>$orderbyidtk,'getlike_byuser' => $getlike_byuser,'getsearch'=>$getsearch,'count'=>$count]);
 

}


public function hopdong(Request $request,$ID_ORDER){
    //$orderId = $request->input('ID_ORDER');
    $idTK = Session::get('IDTK');

    $hopdong=DB::table('orders')
    ->join('phuongthuc_tt','phuongthuc_tt.ID_PPTT','=','orders.ID_PTTT')
    ->join('taikhoan_sinhvien as  nguoithue','nguoithue.IDTK','=','orders.IDTK')
    ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
    ->join('taikhoan_sinhvien as nguoichothue', 'nguoichothue.IDTK', '=', 'tinthuexe.IDTK')
    ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
    ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
    ->where('orders.ID_ORDER',$ID_ORDER)
    //->where('orders.IDTK',$idTK)
    ->select(
        //nguoichothue
        'nguoichothue.HOTEN as nguoichothue_hoten',
        'nguoichothue.NGAYSINH as nguoichothue_ngaysinh',
        'nguoichothue.SDT as nguoichothue_sdt',
        'nguoichothue.DIACHI as nguoichothue_diachi',
        'nguoichothue.CCCD as nguoichothue_cccd',

        //nguoithue
        'nguoithue.HOTEN as nguoithue_hoten',
        'nguoithue.NGAYSINH as nguoithue_ngaysinh',
        'nguoithue.SDT as nguoithue_sdt',
        'nguoithue.DIACHI as nguoithue_diachi',
        'nguoithue.CCCD as nguoithue_cccd',

    'xe.TENXE','xe.PHANKHOI','xe.MAUXE','loaixe.TEN_LOAI','xe.BIENSO',
    'orders.TOTAL','orders.TGTHUE','orders.TGTRA','tinthuexe.PRICE',
    'orders.timepost','phuongthuc_tt.TEN_PPTT')
    ->get();
    $hopdong->transform(function ($item) {
        $item->timepost = Carbon::parse($item->timepost)->format('H:i:s, d/m/Y'); 
        return $item;
    });
    

    return view('pages.hopdong', ['hopdong'=>$hopdong]);

}


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function confirm(Request $request){
        
        $orderId = $request->input('ID_ORDER');
        $email = $request->input('EMAIL');


        $updateOrder = DB::table('orders')
            ->where('ID_ORDER', $orderId)
            ->update(['ID_TT' => 2]);

        if ($updateOrder) {

              Mail::raw("Cảm ơn bạn đã thuê xe tại CTRent.
    Đơn thuê xe của bạn đã được xác nhận .
    Mã đơn thuê xe của bạn là: CTRENT " . $orderId ."
    Liên hệ với chủ xe để nhận xe bạn nhé!",
    function ($message) use ($email) {
              $message->to($email)
            ->subject('Cảm ơn bạn đã đặt hàng');
        });              
            return redirect()->back()->with('success', 'Đơn đã được xác nhận!');
        } else {
            
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
        }
        
    }

    public function confirm_buy(Request $request){
        $orderId = $request->input('ID_ORDER');
        $id_tin = $request->input('ID_TIN');
        $pttt= $request->input('ID_PTTT');
        $total= $request->input('total');

        
        $updateOrder = DB::table('orders')
            ->where('ID_ORDER', $orderId)
            ->update(['ID_TT' =>3]);

        if ($updateOrder) {

            $ownerId = DB::table('tinthuexe')
            ->where('ID_TIN', $id_tin)
            ->value('IDTK'); 

            if (!$ownerId) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin chủ sở hữu của tin này.');
            }

            $transaction = DB::table('giaodich')->where('IDTK', $ownerId)->first();

           
            if (!$transaction) {
            DB::table('giaodich')->insert([
                'IDTK' => $ownerId,
                'SODU' => 0,
                'NOSAN' => 0,
            ]);
            $transaction = DB::table('giaodich')->where('IDTK', $ownerId)->first();
            }

            $sodu = $transaction->SODU;
            $nosan = $transaction->NOSAN;

            if ($pttt == 1) {
               
                $nosan += ($total * 0.1);
            
                if ($sodu >= $total * 0.1) {
                    
                    $sodu -= ($total * 0.1);
                    $nosan = 0;
                } else {
                   
                    $nosan -= $sodu; 
                    $sodu = 0;    
                }


            } elseif ($pttt == 2) {
                
                $sodu += ($total * 0.9); 

                if ($sodu >= $nosan) {
                    $sodu -= $nosan; 
                    $nosan = 0; 
                } else {
                    $nosan -= $sodu; 
                    $sodu = 0; 
                }
            }
            DB::table('giaodich')
            ->where('IDTK', $ownerId)
            ->update([
                'SODU' => $sodu,
                'NOSAN' => $nosan,
            ]);
            
            return redirect()->back()->with('success', 'Đơn đã được xác nhận!');
        } else {
            
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
        }

    }

//---------------------------------------------------------------------------------------------------------------------------------------

public function confirm_huy(Request $request){
    $orderId = $request->input('ID_ORDER');
    $noidung = $request->input('noidung');
    $lydohuy = DB::table('lydohuy')
    ->insert([
        'noidung'=>$noidung,
        'ID_ORDER' =>$orderId
    ]);

    
    $updateOrder = DB::table('orders')
        ->where('ID_ORDER', $orderId)
        ->update(['ID_TT' =>5]);

    if ($lydohuy && $updateOrder) {
       
        return redirect()->back()->with('thanhcong', 'Hủy đơn thành công!');
    } else {
        
        return redirect()->back()->withErrors(['huy' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
    }

}

public function tuchoi(Request $request){
    $orderId = $request->input('ID_ORDER');
    
    $updateOrder = DB::table('orders')
        ->where('ID_ORDER', $orderId)
        ->update(['ID_TT' =>5]);

    if ($updateOrder) {
        
        return redirect()->back()->with('thanhcong', 'Đã từ chối!');
    } else {
        
        return redirect()->back()->withErrors(['huy' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
    }

}

//---------------------------------------------------------------------------------------------------------------------------------------
public function confirm_datlai(Request $request){
    $orderId = $request->input('ID_ORDER');

    // Cập nhật trạng thái đơn hàng (ID_TT = 1)
    $updateOrder = DB::table('orders')
        ->where('ID_ORDER', $orderId)
        ->update(['ID_TT' =>1]);

    if ($updateOrder) {
        
        return redirect()->back()->with('thanhcong', 'Đặt thành công!');
    } else {
        return redirect()->back()->withErrors(['huy' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
    }

}

// ---------------------------------------------------------------------------------------------------------------------------------------
    public function danhgia(Request $request) {
        try {
            $orderId = $request->input('ID_ORDER');
            $idTK = Session::get('IDTK');
            $ID_TIN = $request->input('ID_TIN');
            $mucDo = $request->input('MUCDO');
            
            if (empty($mucDo)) {
                return redirect()->back()->with('error', 'Quy định từ 1 sao.');
            }
            
            $path = null;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/danhgia'), $imageName);
                    $path = 'images/danhgia/' . $imageName;
                }
            }
            
            $data = [
                'IDTK' => $idTK,
                'ID_TIN' => $ID_TIN,
                'MUCDO' => $mucDo,
                'BINHLUAN' => $request->comment,
                'DGCHUXE' => $request->binhluan,
                'anhdg' => $path,
            ];
            
            //dd($data); // Tạm dừng để kiểm tra dữ liệu
    
            DB::table('danhgia_thuexe')->insert($data);
            DB::table('orders')->where('ID_ORDER', $orderId)->update(['ID_TT' => 4]);
    
            return redirect()->to('/order_buy/3')->with('success', 'Đánh giá của bạn đã được ghi nhận.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
   
    //-----------------------------------------------------------------------------------------------------------------------------

    public function danhgia_ngthue(Request $request) {
        try {
            $orderId = $request->input('ID_ORDER');
            $idTK = Session::get('IDTK');
            $IDTK = $request->input('IDTK');
            $mucDo = $request->input('MUCDO');
            
            if (empty($mucDo)) {
                return redirect()->back()->with('error', 'Quy định từ 1 sao.');
            }
            
            $path = null;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/danhgia'), $imageName);
                    $path = 'images/danhgia/' . $imageName;
                }
            }
            
            $data = [
                'IDTK' => $IDTK,
                'ID_ORDER' => $orderId,
                'MUCDO' => $mucDo,
                'BINHLUAN' => $request->comment,
                'anhdg' => $path,
            ];
            
            //dd($data); 
    
            DB::table('danhgia_ngthue')->insert($data);
            // DB::table('orders')->where('ID_ORDER', $orderId)->update(['ID_TT' => 4]);
    
            return redirect()->to('/order_sell/3')->with('success', 'Đánh giá của bạn đã được ghi nhận.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
   
    //-----------------------------------------------------------------------------------------------------------------------------




}
