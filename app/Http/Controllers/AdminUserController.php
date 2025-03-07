<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Session; 



session_start();


class AdminUserController extends Controller{
    public function thongke_user($IDTK){

        $tin = DB::table('tinthuexe')
        ->where('IDTK',$IDTK)
        ->count();

        $order = DB::table('tinthuexe')
        ->join('orders','orders.ID_TIN','=','tinthuexe.ID_TIN')
        ->where('tinthuexe.IDTK',$IDTK)
        ->count('orders.ID_ORDER');

        $counthoanthanh= DB::table('orders')
         ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
         ->where('tinthuexe.IDTK','=',$IDTK)
         ->whereIn('orders.ID_TT',[3,4])
         ->count('orders.ID_ORDER');

        $revenu = DB::table('orders')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
        ->where('tinthuexe.IDTK','=',$IDTK)
        ->whereIn('orders.ID_TT',[3,4])
        ->sum('orders.TOTAL');
        $revenue = $revenu * 0.9;

        $sodu = DB::table('giaodich')
        ->where('IDTK', $IDTK)
        ->first();

        $taikhoan = DB::table('taikhoan_sinhvien')
        ->where('IDTK', $IDTK)
        ->first();
        //dd($taikhoan);

        
        return view('admin.admin_thongke_user',['taikhoan'=>$taikhoan,'sodu'=>$sodu,'tin'=>$tin,'order'=>$order ,'counthoanthanh'=>$counthoanthanh,'revenue'=>$revenue]);

        


    }
    public function thongke(Request $request,$IDTK){
        //$IDTK = $request->input('IDTK');

        if (!$IDTK) {
            return response()->json(['error' => 'IDTK không được cung cấp'], 400);
        }
        $dt = DB::table('orders')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
        ->whereIn('orders.ID_TT',[3,4])
        ->where('tinthuexe.IDTK',$IDTK)
        ->selectRaw('orders.ID_TT,orders.ID_ORDER,tinthuexe.IDTK,DATE_FORMAT(orders.timepost, "%Y-%m") as month, SUM(orders.TOTAL *0.9)  as total') 
        ->groupBy('orders.ID_TT','orders.ID_ORDER','tinthuexe.IDTK','month')
        ->orderBy('month','ASC')
        ->get();
        //dd($dt);
        $ln = [
            "name" => "Doanh thu",
            "data" => $dt->pluck('total')->map(fn($value) => (float) $value)->toArray(),
            "categories" => $dt->pluck('month')->toArray() 
        ];

        $dtonl = DB::table('orders')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
        ->whereIn('orders.ID_TT',[3,4])
        ->where('tinthuexe.IDTK',$IDTK)
        ->where('orders.ID_PTTT',1)
        ->selectRaw('orders.ID_PTTT,orders.ID_TT,orders.ID_ORDER,tinthuexe.IDTK,DATE_FORMAT(orders.timepost, "%Y-%m") as month, SUM(orders.TOTAL *0.9)  as total') 
        ->groupBy('orders.ID_PTTT','orders.ID_TT','orders.ID_ORDER','tinthuexe.IDTK','month')
        ->orderBy('month','ASC')
        ->get();
        //dd($dtonl);
        $lnonl = [
            "name" => "Doanh thu Online",
            "data" => $dtonl->pluck('total')->map(fn($value) => (float) $value)->toArray(),
            "categories" => $dtonl->pluck('month')->toArray() 
        ];

        $dtlive = DB::table('orders')
        ->join('tinthuexe','tinthuexe.ID_TIN','=','orders.ID_TIN')
        ->whereIn('orders.ID_TT',[3,4])
        ->where('tinthuexe.IDTK',$IDTK)
        ->where('orders.ID_PTTT',2)
        ->selectRaw('orders.ID_PTTT,orders.ID_TT,orders.ID_ORDER,tinthuexe.IDTK,DATE_FORMAT(orders.timepost, "%Y-%m") as month, SUM(orders.TOTAL *0.9)  as total') 
        ->groupBy('orders.ID_PTTT','orders.ID_TT','orders.ID_ORDER','tinthuexe.IDTK','month')
        ->orderBy('month','ASC')
        ->get();
        //dd($dtonl);
        $lnlive = [
            "name" => "Doanh thu trực tiếp",
            "data" => $dtlive->pluck('total')->map(fn($value) => (float) $value)->toArray(),
            "categories" => $dtlive->pluck('month')->toArray() 
        ];

        return response()->json(['ln'=>$ln, 'lnonl'=>$lnonl,'lnlive'=>$lnlive]);
            
    }


}