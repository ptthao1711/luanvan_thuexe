<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


  
session_start();


class UserController extends Controller
{
    public function index(){
        return view('login');
    }
    //
    public function trangchu() {
        $userId = Session::get('IDTK');

    if (!$userId) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập trước');
    }

    $user = DB::table('taikhoan_sinhvien')->where('IDTK', $userId)->first();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Người dùng không tồn tại');
    }

    return view('home', compact('user'));
      
    }
    public function register(Request $request)  
    {  
        $user_hoten= $request->user_hoten;
        $user_email = $request->user_email;
        $user_password = $request->user_password;
        $token= rand(0000,9999);
        $existingUser = DB::table('taikhoan_sinhvien')->where('EMAIL', $user_email)->first();  
        if ($existingUser) {  
            // Nếu đã tồn tại, trả về thông báo  
            return redirect()->back()->with('error', 'Tài khoản đã tồn tại!');  
        } else {  
            $result = DB::table('taikhoan_sinhvien')->insert([  
                'EMAIL' => $user_email,  
                'PASSWORD' => ($user_password), // Mã hóa mật khẩu  
                'HOTEN' => $user_hoten,  
            ]);  

            $newUserId = DB::getPdo()->lastInsertId();
            $likes=DB::table('likes')  
            ->insert(['IDTK'=>$newUserId]);

            $giaodich = DB::table('giaodich')
            ->insert([ 'IDTK'=>$newUserId,'SODU'=> 0, 'NOSAN' =>0]);
    
            if ($result && $likes && $giaodich) {  
                return redirect()->back()->with('success', 'Đăng ký thành công!');  
            } else {  
                return redirect()->back()->with('error', 'Đã xảy ra lỗi trong quá trình đăng ký.');  
            }
        }
    }
    public function login(Request $request){
        $user_email = $request->user_email;
        $user_password = $request->user_password;
        $result = DB::table('taikhoan_sinhvien')->where('EMAIL',$user_email)->where('PASSWORD', $user_password)->first();
        
        if($result){
            Session::put('IDTK',$result->IDTK);
            Session::put('HOTEN',$result->HOTEN);
            Session::put('avt',$result->avt);
            Session::put('EMAIL',$result->EMAIL);

            // cập nhật thời gian truy cập
            DB::table('taikhoan_sinhvien')  
            ->where('EMAIL', $user_email) // Bạn có thể sử dụng IDTK nếu có  
            ->update(['trangthaihoatdong' => now()]);
            
            
            //Session::put('password',$result->password);
            if($request->has('search')){
                return Redirect::to ('/search');
            }elseif($request->has('detail')){
                return Redirect::to('/detail/{ID_TIN}');
                }
                elseif($request->has('order_buy')){
                    return Redirect::to('/order_buy');
                    }
                    elseif($request->has('order_sell')){
                        return Redirect::to('/order_sell');
                        }
                    elseif($request->has('profile')){
                        return Redirect::to('/profile');
                        }
                        elseif($request->has('detail_order')){
                            return Redirect::to('/detail_order');
                            }
                        elseif($request->has('news')){
                            return Redirect::to('/news');
                            }
                            elseif($request->has('mynews')){
                                return Redirect::to('/mynews');
                                }
                                elseif($request->has('hopdong')){
                                    return Redirect::to('/hopdong');
                                    }
                                    elseif($request->has('chat')){
                                        return Redirect::to('/chat');
                                        }
                                        elseif($request->has('taichinh')){
                                            return Redirect::to('/taichinh');
                                            }
                    else{
                        return Redirect::to('/home');
                    }
               
        }else{
            Session::put('message','Email hoặc mật khẩu đăng nhập không chính xác!');
            return Redirect::to('');
        }
    }
    public function logout(){
        Session::put('IDTK',null);
        Session::put('HOTEN', null);
        Session::put('avt',null);
        return Redirect::to('/home');

    }
     
     public function redirect_google()
     {
         return Socialite::driver('google')->redirect();
     }
 
     
     public function handle_google()
     {
         try {
             
             $user = Socialite::driver('google')->user();
             //dd($user);
 
             
             $findUser = DB::table('taikhoan_sinhvien')->where('id_google', $user->id)->first();
 
             if ($findUser) {
                 
                 Session::put('IDTK', $findUser->IDTK);
                 Session::put('HOTEN', $findUser->HOTEN);
                 Session::put('avt', $findUser->avt);
                 Session::put('EMAIL', $findUser->EMAIL);
 
                 return redirect()->intended('home')->with('success', 'Đăng nhập thành công');
             } else {
                 $findUserByEmail = DB::table('taikhoan_sinhvien')->where('EMAIL', $user->email)->first();
 
                 if ($findUserByEmail) {
                     DB::table('taikhoan_sinhvien')->where('EMAIL', $user->email)->update([
                         'id_google' => $user->id
                     ]);

                     Session::put('IDTK', $findUserByEmail->IDTK);
                     Session::put('HOTEN', $findUserByEmail->HOTEN);
                     Session::put('avt', $findUserByEmail->avt);
                     
 
                     return redirect()->intended('home')->with('message', 'Đăng nhập thành công');
                 } else {
                    
                     $newUserId = DB::table('taikhoan_sinhvien')->insertGetId([
                         'EMAIL' => $user->email,
                         'PASSWORD' => 'b2011992' 
                     ]);
                     DB::table('giaodich')
                     ->insert([
                     'IDTK'=>$newUserId,
                     'SODU'=>0,
                     'NOSAN'=>0

                    ]);
 
        
                     Session::put('IDTK', $newUserId);
                     Session::put('HOTEN', $user->name);
                     Session::put('avt', $user->avatar);
 
                     return redirect()->route('home')->with('success', 'Tạo tài khoản thành công và đăng nhập');
                 }
             }
             
         } catch (Exception $e) {
             return redirect()->route('login.google')->with('error', 'Có lỗi xảy ra trong quá trình đăng nhập.');
         }
     }

     

    public function profile(Request $request)
    {
        
        try {          
            $idTK = session::get('IDTK');
                    
            if ($request->hasFile('image')) {
                
                $image = $request->file('image');
                              
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                              
                $image->move(public_path('images/avt'), $imageName);
                             
                $path = 'images/avt/' . $imageName;
                            
                $data = array();
                $data['IDTK'] = $idTK;
                $data['HOTEN'] = $request->hoten;
                $data['MSSV'] = $request->mssv;
                $data['KHOA'] = $request->khoa;
                $data['NGAYSINH'] = $request->ngaysinh;
                $data['SDT'] = $request->phone;
                $data['CCCD'] = $request->CCCD;
                $data['DIACHI'] = $request->DIACHI;
                $data['avt'] = $path; 
    
               
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


    public function showprofile(Request $request){
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
        $showtk=DB::table('taikhoan_sinhvien')
        ->where('IDTK','=',$idTK)
        ->select('IDTK','HOTEN','avt','MSSV','NGAYSINH','KHOA','SDT','DIACHI','EMAIL','CCCD')
        ->first();
       
        return view('pages.profile',['getlike_byuser'=> $getlike_byuser,'getsearch'=>$getsearch,'count'=>$count,'showtk'=>$showtk]);
    }
    

    public function account(Request $request, $IDTK){
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

         $account_by = DB::table('taikhoan_sinhvien')
         ->where('taikhoan_sinhvien.IDTK',$IDTK)
         ->get();
         //dd($account_by);

         $account_news = DB::table('tinthuexe')  
         ->join('phuongxa','phuongxa.id','=','tinthuexe.ID_XA')
         ->join('xe', 'xe.ID_XE', '=', 'tinthuexe.ID_XE')  
         ->join('image', 'image.ID_XE', '=', 'xe.ID_XE')  
         ->where('tinthuexe.IDTK',$IDTK)
         //->where('IDTTT',2)
         ->get();

         $tin=DB::table('tinthuexe')
         ->where('IDTK',$IDTK)
         //->where('IDTTT',2)
         ->get();
         $count_tin = count($tin);


         return view('pages.detail_account',['count_tin'=>$count_tin,'account_news'=>$account_news,'account_by'=>$account_by,'getlike_user' => $getlike_user,'getsearch'=>$getsearch,'count'=>$count]);

    }
    
}
    
