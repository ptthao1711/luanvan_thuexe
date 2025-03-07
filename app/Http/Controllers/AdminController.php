<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Session; 



session_start();


class AdminController extends Controller
{
    public function confirm_new(){
        $comfirm_news = DB::table('xe')
       ->join('tinthuexe','tinthuexe.ID_XE','=','xe.ID_XE')
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','tinthuexe.IDTK')
       ->where('tinthuexe.IDTTT','=',1)
       ->select('tinthuexe.TIEUDE','tinthuexe.timepost','taikhoan_sinhvien.avt','taikhoan_sinhvien.HOTEN','taikhoan_sinhvien.IDTK','tinthuexe.PRICE',DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
       ->groupBy('tinthuexe.TIEUDE','tinthuexe.timepost','taikhoan_sinhvien.avt','taikhoan_sinhvien.HOTEN','taikhoan_sinhvien.IDTK','tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
       ->orderBy('tinthuexe.timepost','desc')
       ->get();
       return view('admin.admin_news',['comfirm_news' => $comfirm_news]);
    }


    public function upload(Request $request){
       
        $newId = $request->input('ID_TIN');
        $updateOrder = DB::table('tinthuexe')
            ->where('ID_TIN', $newId)
            ->update(['IDTTT' => 2]);
        if ($updateOrder) {  
            return redirect()->back()->with('success', 'Tin được duyệt!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
        }
    }
    public function tuchoi(Request $request){
        
        $newId = $request->input('ID_TIN');
        $updateOrder = DB::table('tinthuexe')
            ->where('ID_TIN', $newId)
            ->update(['IDTTT' => 3]);

        if ($updateOrder) {
            
            return redirect()->back()->with('thanhcong', 'Đã từ chối!');
        } else {
        
            return redirect()->back()->withErrors(['loi' => 'Kiểm tra lại']);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    
    public function showAdminHome()
    {
        // Lấy số lượt truy cập hiện tại từ bảng `page_views`
        $totalViews = DB::table('page_views')->where('IDP',1)->value('views');
        $totalViews2 = DB::table('page_views')->where('IDP',2)->value('views');
        $totalViews3 = DB::table('page_views')->where('IDP',3)->value('views');
      
        $totaluser = DB::table('taikhoan_sinhvien')
        ->get();
        $countuser = count($totaluser);
      
        $totalNews = DB::table('tinthuexe')
        ->get();
        $countNews = count($totalNews);

        
        $totalOrrders = DB::table('orders')
        ->get();
        $countOrder = count($totalOrrders);


        return view('admin.admin_home', ['totalViews' => $totalViews,'totalViews2' => $totalViews2,'totalViews3' => $totalViews3,'countuser'=>$countuser,'countNews'=>$countNews,'countOrder'=> $countOrder]);
    }


    //---------------------------------------------------------------------------------------------------------------------------
    //Get table taikhoan_sinhvien
    public function qltaikhoan(Request $request){
        $alluser = DB::table('taikhoan_sinhvien')
        ->get();
        return view('admin.admin_taikhoan',['alluser'=>$alluser]);

    }

    public function taichinh(Request $request){
        $tabletaichinh = DB::table('thongtintaikhoan')
        ->join('giaodich','giaodich.IDTK','=','thongtintaikhoan.IDTK')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','thongtintaikhoan.IDTK')
        ->where('thongtintaikhoan.TRANGTHAI',1)
        ->select('taikhoan_sinhvien.HOTEN','taikhoan_sinhvien.EMAIL','giaodich.SODU','taikhoan_sinhvien.IDTK','thongtintaikhoan.MA','thongtintaikhoan.BANK','thongtintaikhoan.NAME','thongtintaikhoan.STK','thongtintaikhoan.MONEY')
        ->get();
 
        //dd($tabletaichinh);
        return view('admin.admin_xulygiaodich',['tabletaichinh'=>$tabletaichinh]);
    }
    public function deletetk(Request $request){
        $ma = $request->input('MA');
        $update=DB::table('thongtintaikhoan')
        ->where('MA',$ma)
        ->update(['TRANGTHAI'=> 2]);

        if ($update) {
            return redirect()->back()->with('success', 'Đã từ chối giao dịch!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Kiểm tra lại']);
        }

    }

    //---------------------------------------------------------------------------------------------------------------------------
    public function check_news(Request $request, $ID_TIN){

        $check_new = DB::table('tinthuexe')
        ->leftJoin('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->leftJoin('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen')
        ->leftJoin('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
        ->leftJoin('image', 'image.ID_XE', '=', 'xe.ID_XE') 
        ->leftJoin('image_giayxe','image_giayxe.ID_XE','=','xe.ID_XE')
        ->leftJoin('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')
        ->leftJoin('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->where('tinthuexe.ID_TIN',$ID_TIN)
        ->select('tinthuexe.TIEUDE','tinthuexe.IDTTT','xe.MAUXE','image_giayxe.DUONGDAN as giayxe','xe.NGAYMUA','xe.TENXE','tinthuexe.THONGTIN','loaixe.TEN_LOAI','xe.BIENSO','tinhtrangxe.TenTTX','phuongxa.ten_phuong_xa','quanhuyen.ten_quan_huyen',
        'tinthuexe.TGTHUE','tinthuexe.TGTRA','tinthuexe.PRICE',DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.ID_TIN','tinthuexe.IDTTT','xe.MAUXE','giayxe','xe.NGAYMUA','xe.TENXE','tinthuexe.THONGTIN','loaixe.TEN_LOAI','xe.BIENSO','tinhtrangxe.TenTTX','phuongxa.ten_phuong_xa',
        'quanhuyen.ten_quan_huyen','tinthuexe.TGTHUE','tinthuexe.TGTRA','tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'tinthuexe.timepost','tinthuexe.VITRI',)  
        ->orderBy('tinthuexe.ID_TIN')  
        ->get();
        //dd($ID_TIN);

        return view('admin.admin_checknews',['check_new'=>$check_new]);

    }

// -------------------------------------------------------------------------------------------------------------------------------------
    public function delete_taikhoan(Request $request){

        $idTK = $request->input('IDTK');

        $delete_likes = DB::table('likes')
        ->where('IDTK',$idTK)
        ->delete();
    

        $result = DB::table('taikhoan_sinhvien')
        ->where('IDTK',$idTK)
        ->delete();

        if ($delete_likes && $result) {
          
            return redirect()->back()->with('success', 'Đã xóa tài khoản!');
        } else {
           
            return redirect()->back()->withErrors(['error' => 'Kiểm tra lại']);
        }



    }
    // -------------------------------------------------------------------------------------------------------------------------------------
    public function thongke(Request $request){
        $thongke1 = DB::table('orders')
        ->where('ID_PTTT',1)
        ->selectRaw('DATE_FORMAT(timepost, "%Y-%m") as month, SUM(TOTAL) as tonggia') 
        ->groupBy('month')
        ->orderBy('month','ASC')
        ->get();

        $thongke2 = DB::table('orders')
        ->where('ID_PTTT',2)
        ->selectRaw('DATE_FORMAT(timepost, "%Y-%m") as month, SUM(TOTAL) as tonggia') 
        ->groupBy('month')
        ->orderBy('month','ASC')
        ->get();

        $data1 = [
            "name" => "Doanh thu trực tiếp",
            "data" => $thongke1->pluck('tonggia')->map(fn($value) => (float) $value)->toArray(),
            "categories" => $thongke1->pluck('month')->toArray() 
        ];

        $data2 = [
            "name" => "Doanh thu online",
            "data" => $thongke2->pluck('tonggia')->map(fn($value) => (float) $value)->toArray(),
            "categories" => $thongke2->pluck('month')->toArray() 
        ];

        $count_news = DB::table('tinthuexe')
        ->selectRaw('DATE_FORMAT(time_create, "%Y-%m") as month, COUNT(ID_TIN) as sltin') 
        ->groupBy('month')
        ->orderBy('month','ASC')
        ->get();

        $count = [
            "name" => "Số lượng bài đăng của tháng",
            "soluong" => $count_news->pluck('sltin')->map(fn($value) => (float) $value)->toArray(),
            "month" => $count_news->pluck('month')->toArray() 
        ];

        $profit = DB::table('orders')
        //->where('ID_ORDER',3)
        ->selectRaw('DATE_FORMAT(timepost, "%Y-%m") as month, SUM(TOTAL *0.1)  as total') 
        ->groupBy('month')
        ->orderBy('month','ASC')
        ->get();

        //dd($profit);

        $loinhuan = [
            "name" => "Lợi nhuận từ phí sàn",
            "data" => $profit->pluck('total')->map(fn($value) => (float) $value)->toArray(),
            "categories" => $profit->pluck('month')->toArray() 
        ];

        $counttk = DB::table('taikhoan_sinhvien')
        ->selectRaw('DATE_FORMAT(time_create, "%Y-%m") as month, count(IDTK)  as taikhoan') 
        ->groupBy('month')
        ->orderBy('month','ASC')
        ->get();

        //dd($counttk);

        $count_tk = [
            "name" => "Số lượng người dùng tham gia hệ thống",
            "soluong" => $counttk->pluck('taikhoan')->map(fn($value) => (float) $value)->toArray(),
            "month" => $counttk->pluck('month')->toArray() 
        ];

        //Đơn hủy và hoàn thành

        $order_huy =DB::table('orders')
        ->where('ID_TT',5)
        ->count();

         $order_hoanthanh = DB::table('orders')
         ->whereIn('ID_TT',[3,4])
         ->count();

         //đếm lượt truy cập
         $view_home =DB::table('page_views')
         ->where('IDP',1)
         ->select('views')
         ->get();

         
         $view_map =DB::table('page_views')
         ->where('IDP',2)
         ->select('views')
         ->get();
         $view_chat =DB::table('page_views')
         ->where('IDP',3)
         ->select('views')
         ->get();
         $view_detail =DB::table('page_views')
         ->where('IDP',4)
         ->select('views')
         ->get();
         $view_search =DB::table('page_views')
         ->where('IDP',7)
         ->select('views')
         ->get();
         $view_ordersell =DB::table('page_views')
         ->where('IDP',6)
         ->select('views')
         ->get();
         $view_orderbuy =DB::table('page_views')
         ->where('IDP',5)
         ->select('views')
         ->get();


        return response()->json(['view_orderbuy'=>$view_orderbuy,'view_ordersell'=>$view_ordersell,'view_search'=>$view_search,'view_detail'=>$view_detail,'view_chat'=>$view_chat,'view_map'=>$view_map,
        'view_home'=>$view_home,'order_hoanthanh'=>$order_hoanthanh,'order_huy'=>$order_huy,'count_tk'=>$count_tk,'loinhuan'=>$loinhuan,'count'=>$count,'data1' => $data1, 'data2' => $data2]);
    }

}