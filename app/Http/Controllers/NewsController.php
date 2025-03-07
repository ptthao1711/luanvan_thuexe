<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;

use Session; // dùng để  lưu tạm các message sau khi thực hiện một công việc gì đó.
use Illuminate\Support\Facades\Redirect; // dùng để chuyển hướng
use function Laravel\Prompts\select;

session_start();


class NewsController extends Controller
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
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->select('tinthuexe.TIEUDE','tinthuexe.PRICE',DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
       //->where('tinthuexe.IDTTT','=','1')
       ->groupBy('tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
       ->get();
       //Session::put('ID_TIN',$allcategorynews->ID_TIN);
     

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
        ->select('search.IDTK','search.WORD')
        ->where( 'search.IDTK',$idTK)
        ->orderBy('search.IDTK')
        ->get();


        $catebyid=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->get(); 

        $tinhtrang = DB:: table('tinhtrangxe')
        ->select('ID_TTX','TENTTX')
        ->get();

        $getQuanHuyen = DB::table('quanhuyen')
        ->get();
        $getPhuongXa=collect();
        

        session(['allcategorynews' => $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
        return view('pages.news',['getPhuongXa'=>$getPhuongXa,'getQuanHuyen'=> $getQuanHuyen,'tinhtrang'=>$tinhtrang,'catebyid' =>$catebyid,'allcategorynews' => $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
      
    }

    public function getPhuongXa($quanHuyenId)
    {
        // Lấy danh sách phường/xã theo id_quan_huyen
        $getPhuongXa = DB::table('phuongxa')
            ->where('id_quan_huyen', $quanHuyenId)
            ->get();

        // Trả về JSON để dùng với AJAX
        return response()->json($getPhuongXa);
    }

    public function addnews(Request $request){
    // Lấy ID tài khoản từ session
    $idTK = Session::get('IDTK');

   
     $data = array();

     // Lưu các giá trị vào mảng $data
     $data['IDTK'] = $idTK;
     $data['ID_LOAI'] = $request->loai_xe;
     $data['ID_TTX'] = $request->tinh_trang;
     $data['TENXE'] = $request->ten_xe;
     $data['PHANKHOI'] = $request->phan_khoi;
     $data['BIENSO'] = $request->bienso;
     $data['MAUXE'] = $request->mauxe;


    // Bắt đầu transaction
    DB::beginTransaction();

    try {
        // 1. Thêm vào bảng 'xe'
        $addxe = DB::table('xe')->insertGetId(
            $data
        );


        // 2. Upload ảnh và lưu đường dẫn vào bảng 'image'
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Tạo tên ảnh duy nhất và lưu vào thư mục public/images/xe
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/xe'), $imageName);
            $path = 'images/xe/' . $imageName;
            $data1 = array();
            $data1['ID_XE'] = $addxe;
            $data1['DUONGDAN'] = $path;

            // Lưu đường dẫn ảnh vào bảng 'image'
             DB::table('image')->insert($data1);
        } else {
            throw new Exception('Image upload failed');
        }

        // 3. Upload ảnh giấy tờ xe và lưu đường dẫn vào bảng 'image_giayxe'
        if ($request->hasFile('giayxe')) {
            $giayxe = $request->file('giayxe');
            // Tạo tên ảnh duy nhất và lưu vào thư mục public/images/giayxe
            $giayxeName = time() . '_giayxe.' . $giayxe->getClientOriginalExtension();
            $giayxe->move(public_path('images/giayxe'), $giayxeName);
            $pathGiayXe = 'images/giayxe/' . $giayxeName;
            $dataGiayXe = array();
            $dataGiayXe['ID_XE'] = $addxe;
            $dataGiayXe['DUONGDAN'] = $pathGiayXe;

            // Lưu đường dẫn ảnh vào bảng 'image_giayxe'
            DB::table('image_giayxe')->insert($dataGiayXe);
        } else {
            throw new Exception('Giayxe image upload failed');
        }


        $data2 = array();
        $data2['IDTK'] = $idTK;
        $data2['ID_XE'] = $addxe;
        $data2['VITRI'] = $request->diachi;
        $data2['ID_XA'] = $request->phuongxa;
        $data2['TIEUDE'] = $request->tieu_de;
        $data2['PRICE'] = $request->price;
        $data2['THONGTIN'] = $request->thong_tin;
        $data2['TGTHUE'] = $request->ngay_thue;
        $data2['TGTRA'] = $request->ngay_tra;

        // 3. Thêm vào bảng 'tinthuexe'
        $addnew=DB::table('tinthuexe')->insertGetId($data2);

        // Nếu tất cả các thao tác thành công, commit giao dịch
        DB::commit();

        return redirect()->back()->with('succe', 'Tin đã được thêm và chờ duyệt nhé!' . $addnew);
    } catch (Exception $e) {
        // Nếu có lỗi, rollback toàn bộ giao dịch
        DB::rollBack();

        // Xử lý ngoại lệ, có thể ghi log hoặc trả về thông báo lỗi
        return redirect()->back()->withErrors(['erro' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
    }
}


    public function mynews(Request $request){
        $idTK = session::get('IDTK');
           
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

         
        $status_tin=DB::table('status_tin')
        ->select('IDTTT','TENTTT')
        ->get();

        $allnews=DB::table('tinthuexe')
        ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->join('status_tin','status_tin.IDTTT','=','tinthuexe.IDTTT')
        ->where('tinthuexe.IDTK',$idTK)
        ->select('tinthuexe.IDTK','tinthuexe.IDTTT','tinthuexe.TIEUDE','tinthuexe.PRICE','tinthuexe.timepost', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.IDTK','tinthuexe.IDTTT','tinthuexe.TIEUDE','tinthuexe.PRICE','tinthuexe.timepost','tinthuexe.ID_TIN')  
        ->orderBy('tinthuexe.IDTK')
        ->get();

        return view('pages.mynews',['allnews'=>$allnews,'status_tin'=>$status_tin,'countlikes'=>$countlikes,'count'=>$count,'getlike_user'=>$getlike_user]);

    }

    public function newbystatus($idttt){
        $idTK = session::get('IDTK');
           
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

         
        $status_tin=DB::table('status_tin')
        ->select('IDTTT','TENTTT')
        ->get();

        $allnews=DB::table('tinthuexe')
        ->join('xe','xe.ID_XE','=','tinthuexe.ID_XE')
        ->join('image','image.ID_XE','=','xe.ID_XE')
        ->where('tinthuexe.IDTTT',$idttt)
        ->where('tinthuexe.IDTK',$idTK)
        ->select('tinthuexe.IDTK','tinthuexe.IDTTT','tinthuexe.TIEUDE','tinthuexe.PRICE','tinthuexe.timepost', DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.ID_TIN')
        ->groupBy('tinthuexe.IDTK','tinthuexe.IDTTT','tinthuexe.TIEUDE','tinthuexe.PRICE','tinthuexe.timepost','tinthuexe.ID_TIN')  
        ->orderBy('tinthuexe.IDTK')
        ->get();


        return view('pages.mynews',['allnews'=>$allnews,'status_tin'=>$status_tin,'countlikes'=>$countlikes,'count'=>$count,'getlike_user'=>$getlike_user]);

    }

    public function edit_news(Request $request,$ID_TIN){
        $idTK = Session::get('IDTK');
        //$ID_TIN = $request->input('ID_TIN');
        

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
       ->join('image','image.ID_XE','=','xe.ID_XE')
       ->select('tinthuexe.TIEUDE','tinthuexe.PRICE',DB::raw('MIN(image.DUONGDAN) as DUONGDAN'),'tinthuexe.timepost','tinthuexe.VITRI','tinthuexe.ID_TIN')
       //->where('tinthuexe.IDTTT','=','1')
       ->groupBy('tinthuexe.TIEUDE', 'tinthuexe.PRICE', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
       ->get();
       //Session::put('ID_TIN',$allcategorynews->ID_TIN);
     

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
        ->select('search.IDTK','search.WORD')
        ->where( 'search.IDTK',$idTK)
        ->orderBy('search.IDTK')
        ->get();


        $catebyid=DB::table('loaixe')
        ->select('ID_LOAI','TEN_LOAI')
        ->get(); 

        $tinhtrang = DB:: table('tinhtrangxe')
        ->select('ID_TTX','TENTTX')
        ->get();

        $getQuanHuyen = DB::table('quanhuyen')
        ->get();
        $getPhuongXa=collect();


        $edit =DB::table('xe')  
        ->join('tinthuexe', 'tinthuexe.ID_XE', '=', 'xe.ID_XE')
        ->join('loaixe','loaixe.ID_LOAI','=','xe.ID_LOAI')
        ->join('tinhtrangxe','tinhtrangxe.ID_TTX','=','xe.ID_TTX')     
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA') 
        ->join('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen') 
        ->leftJoin('image', 'image.ID_XE', '=', 'xe.ID_XE') 
        ->leftJoin('image_giayxe', 'image_giayxe.ID_XE', '=', 'xe.ID_XE')
        ->where('tinthuexe.ID_TIN', $ID_TIN)  
        ->select('tinthuexe.TIEUDE','xe.ID_XE','tinthuexe.ID_XA','loaixe.ID_LOAI','loaixe.TEN_LOAI','xe.NGAYMUA','xe.PHANKHOI','xe.NGAYMUA','xe.MAUXE','xe.BIENSO','xe.TENXE','quanhuyen.ten_quan_huyen','phuongxa.ten_phuong_xa','tinthuexe.TGTHUE','tinthuexe.TGTRA',
        'tinthuexe.ID_TIN','image_giayxe.DUONGDAN as DD','tinhtrangxe.ID_TTX','tinhtrangxe.TenTTX', 'tinthuexe.THONGTIN','tinthuexe.PRICE',
          'image.DUONGDAN', 'tinthuexe.timepost', 'tinthuexe.VITRI', 'tinthuexe.ID_TIN')  
        ->groupBy('tinthuexe.TIEUDE','xe.ID_XE','tinthuexe.ID_XA','loaixe.ID_LOAI','loaixe.TEN_LOAI','xe.NGAYMUA','xe.PHANKHOI','xe.NGAYMUA','xe.MAUXE','xe.BIENSO','xe.TENXE','quanhuyen.ten_quan_huyen','phuongxa.ten_phuong_xa','tinthuexe.TGTHUE','tinthuexe.TGTRA',
        'tinthuexe.ID_TIN','image.DUONGDAN','DD','tinhtrangxe.ID_TTX','tinhtrangxe.TenTTX', 'tinthuexe.THONGTIN','tinthuexe.PRICE', 
        'tinthuexe.timepost', 'tinthuexe.VITRI')  
        ->first();


        

        session(['allcategorynews' => $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
        return view('pages.edit_news',['edit'=>$edit,'getPhuongXa'=>$getPhuongXa,'getQuanHuyen'=> $getQuanHuyen,'tinhtrang'=>$tinhtrang,'catebyid' =>$catebyid,'allcategorynews' => $allcategorynews,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);
      
        
    }

    public function update_new(Request $request) {
        $ID_TIN = $request->input('ID_TIN');
        $ID_XE = $request->input('ID_XE');
    
       
        $update_xe = DB::table('xe')
            ->where('ID_XE', $ID_XE)
            ->update([
                'ID_LOAI' => $request->loai_xe,
                'ID_TTX' => $request->tinh_trang,
                'TENXE' => $request->ten_xe,
                'PHANKHOI' => $request->phan_khoi,
                'BIENSO' => $request->bienso,
                'MAUXE' => $request->mauxe,
                'NGAYMUA'=>$request->ngay_mua,
            ]);
    
        $update_new = DB::table('tinthuexe')
            ->where('ID_TIN', $ID_TIN)
            ->update([
                'VITRI' => $request->diachi,
                'ID_XA' => $request->phuongxa,
                'TIEUDE' => $request->tieu_de,
                'PRICE' => $request->price,
                'THONGTIN' => $request->thong_tin,
                'TGTHUE' => $request->ngay_thue,
                'TGTRA' => $request->ngay_tra,
                'IDTTT'=>1,
            ]);
    
        
        if ($update_xe && $update_new) {
          
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/xe'), $imageName);
                $path = 'images/xe/' . $imageName;
            
                DB::table('image')->updateOrInsert(
                    ['ID_XE' => $ID_XE],
                    ['DUONGDAN' => $path]
                );
            }
            
            if ($request->hasFile('giayxe')) {
                $giayxe = $request->file('giayxe');
                $giayxeName = time() . '_giayxe.' . $giayxe->getClientOriginalExtension();
                $giayxe->move(public_path('images/giayxe'), $giayxeName);
                $pathGiayXe = 'images/giayxe/' . $giayxeName;
            
                DB::table('image_giayxe')->updateOrInsert(
                    ['ID_XE' => $ID_XE],
                    ['DUONGDAN' => $pathGiayXe]
                );
            }
        
            
            return redirect()->back()->with('success', 'Tin đã cập nhật.');
        } else {
          
            return redirect()->back()->with('success', 'Tin đã cập nhật.');
        }
    }

    public function hidden_new(Request $request){
        $ID_TIN = $request->input('ID_TIN');

        //dd($ID_TIN);
        $hidden = DB::table('tinthuexe')
        ->where('ID_TIN',$ID_TIN)
        ->update(['IDTTT'=>4]);

        if($hidden){
            return redirect()->back()->with('success', 'Tin đã ẩn.');

        }else{
            return redirect()->back()->withErrors('error', 'Ẩn tin thất bại.');

        }
        


    }
    

}