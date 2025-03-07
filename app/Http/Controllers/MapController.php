<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session; 


class  MapController extends Controller{


    public function show_marker(Request $request)
    {
        $idTK = Session::get('IDTK');
        $newsofmap = Session::get('newsofmap');
        //$fullAddress = Session::get('fullAddress');

        $pageView2 = DB::table('page_views')->where('IDP',2)->first();

        if ($pageView2 === null) {
            // Tạo bản ghi đầu tiên nếu chưa có
            DB::table('page_views')->insert(['views' => 1]);
        } else {
            // Tăng lượt truy cập lên 1 nếu đã có bản ghi
            DB::table('page_views')->where('IDP', $pageView2->IDP)->increment('views');
        }
          
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
        

        $marker = DB::table('tinthuexe')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA') 
        ->join('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen') 
        ->select('tinthuexe.VITRI','phuongxa.ten_phuong_xa','quanhuyen.ten_quan_huyen')
        ->get();
        $getQuanHuyen = DB::table('quanhuyen')
        ->get();
        $getPhuongXa=collect();

        

        //$fullAddress = $marker->VITRI . ',' . $marker->ten_phuong_xa . ', ' . $marker->ten_quan_huyen .','. 'Cần Thơ';
        
        return view('layouts.map',[ 'pageView2'=>$pageView2,'newsofmap' => $newsofmap,'getPhuongXa'=>$getPhuongXa,'getQuanHuyen'=>$getQuanHuyen,'marker'=>$marker,'count'=>$count,'getlike_byuser' => $getlike_byuser,'getsearch'=>$getsearch]);
    }

    public function getPhuongXa($quanHuyenId)
    {
       
        $getPhuongXa = DB::table('phuongxa')
            ->where('id_quan_huyen', $quanHuyenId)
            ->get();

        return response()->json($getPhuongXa);
    }
    public function search_map(Request $request){
        $xa = $request->input('ID_XA');
        $quanhuyen = $request->quanhuyen;
        $idTK = Session::get('IDTK');
        $newsofmap = DB::table('tinthuexe')
        ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
        ->join('quanhuyen','quanhuyen.id','=','phuongxa.id_quan_huyen')
        ->where('tinthuexe.ID_XA',$xa)
        ->orwhere('quanhuyen.id',$quanhuyen)
        ->select('tinthuexe.ID_TIN','tinthuexe.VITRI','phuongxa.ten_phuong_xa','quanhuyen.ten_quan_huyen')
        //->groupBy('tinthuexe.ID_TIN','tinthuexe.VITRI','phuongxa.ten_phuong_xa','quanhuyen.ten_quan_huyen')
        ->get();
        
        if($newsofmap->isNotEmpty()){

            Session::put('newsofmap', $newsofmap);
            //Session::put('fullAddress', $fullAddress);
            return redirect()->route('map');

        } else {
        
        return redirect()->back()->withErrors(['error' => 'Không tìm thấy']);
        }
    }

}

