<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

//Route::get('/check',[HomeController::class,'admin_check']);
Route::get('/profile',[HomeController::class,'register']);
Route::get('/dangky',[HomeController::class,'regist']);
Route::get('/detail/order',[HomeController::class,'order_buy']);
//Route::get('/admin_home',[HomeController::class,'admin']);
Route::get('/account',[HomeController::class,'account']);
Route::get('/mynews',[HomeController::class,'mynews']);
Route::get('/hopdong',[HomeController::class,'hopdong']);
Route::get('/chat',[HomeController::class,'chat']);
Route::get('/map',[HomeController::class,'map']);
Route::get('/admin_thongke',[HomeController::class,'thongke']);
Route::get('/admin_user',[HomeController::class,'admin_thongke_user']);
Route::get('/admin_giaodich',[HomeController::class,'admin_giaodich']);

Route::get('/thanks',[HomeController::class,'thanks'])->name('thanks');
//login with gooogle

Route::get('/login_google', [UserController::class, 'redirect_google'])->name('login.google');
Route::get('/handle_google', [UserController::class, 'handle_google'])->name('handle.google');
// Sửa đường dẫn trang chủ mặc định

Route::get('',[UserController::class,'index']);
Route::get('/home',[UserController::class,'trangchu'])->name('home');
Route::post('/user_home',[UserController::class,'login'])->name('login');
Route::post('',[UserController::class,'register']);
Route::get('/logout',[UserController::class,'logout']);
Route::post('/profile',[UserController::class,'profile'])->name('pro.file');
Route::get('/profile',[UserController::class,'showprofile']);
Route::get('/account/{IDTK}',[UserController::class,'account']);

//category
Route::get('/home', [CategoryController::class,'viewCategories'])->name('home');
Route::delete('/home/{like_id}', [CategoryController::class,'deletelikes'])->name('likes.delete');
Route::delete('/home/dls', [CategoryController::class,'deletelstk'])->name('search.delete');
//Route::post('/search_key', [CategoryController::class,'addsearch'])->name('search.key');


//search_view
Route::get('/search-loai/{id_loai}', [SearchController::class,'viewCategories'])->name('search');
Route::get('/search-tinhtrang/{id_ttx}', [SearchController::class,'newsbytt'])->name('search.idttx');
Route::get('/search-price', [SearchController::class,'newsbyprice'])->name('search.price');
Route::get('/search-price1', [SearchController::class,'newsbyprice1'])->name('search.price1');
Route::get('/search_quan/{idquan}', [SearchController::class,'search_quanhuyen'])->name('search.idquan');

Route::post('/search', [SearchController::class,'SearchKeywords'])->name('search.key');

//detail_view
//Route::delete('/detail/{like_id}', [DetailController::class,'deletelikes'])->name('likes.delete');
Route::get('/detail/{ID_TIN}', [DetailController::class,'header'])->name('detail'); 

 Route::post('/detail/{id_tin}/order', [DetailController::class, 'addorders'])->name('add.orders');
 Route::post( '/detail/{id_tin}', [DetailController::class,'addlike'])->name('add.like');
//detail_order
Route::get('/detail_order/{ID_ORDER}', [DetailController::class,'detail_order'])->name('detail.order');
Route::get('/detail_order_buy/{ID_ORDER}', [DetailController::class,'detail_order_buy'])->name('detail.order.buy');

//order_buy
Route::get('/order_buy', [OrderController::class,'header']);
Route::get('/order_buy/{id_status}', [OrderController::class,'orderbyid'])->name('order.id');
//Route::get('/order_buy/{id_status}', [OrderController::class,'showdg'])->name('show.dg');
//order_sell
Route::get('/order_sell', [OrderController::class,'ordersell']);
Route::get('/order_sell/{id_status}', [OrderController::class,'ordersell_bytt'])->name('order.sell');


Route::patch('/notifications/{id}', [OrderController::class, 'markAsRead'])->name('markAsRead');
Route::post('/order_sell', [OrderController::class, 'confirm'])->name('confirm.order'); 
Route::post('/order_buy/2', [OrderController::class, 'confirm_buy'])->name('confirm.buy');
Route::post('/order_tuchoi/5', [OrderController::class, 'tuchoi'])->name('tuchoi');
Route::post('/order_buy/5', [OrderController::class, 'confirm_huy'])->name('confirm.huy');
Route::post('/order_buy/1', [OrderController::class, 'confirm_datlai'])->name('confirm.datlai');
Route::post('/order_buy/3', [OrderController::class, 'danhgia'])->name('danhgia');
Route::post('/order_sell/3', [OrderController::class, 'danhgia_ngthue'])->name('danhgia.ngthue');
Route::get('/hopdong/{ID_ORDER}', [OrderController::class, 'hopdong'])->name('hopdong');


//addnews
Route::post('/news', [NewsController::class,'addnews'])->name('add.news');
Route::get('/news', [NewsController::class,'viewCategories']);
Route::get('/get_phuong_xa/{quanHuyenId}', [NewsController::class, 'getPhuongXa'])->name('getPhuongXa');

Route::get('/edit_news/{ID_TIN}', [NewsController::class,'edit_news'])->name('edit.news');
Route::post('/update_new', [NewsController::class,'update_new'])->name('update.new');
Route::post('/hidden_new', [NewsController::class,'hidden_new'])->name('hidden.new');


Route::get('/mynews', [NewsController::class,'mynews']);
Route::get('/mynews/{idttt}', [NewsController::class,'newbystatus'])->name('mynews.id');

//chat
Route::get('/chat',[ChatController::class,'chat_home'])->name('chatt');
Route::get('/chat/{ID_HT}',[ChatController::class,'showmess'])->name('chat');
Route::post('/chat/{ID_HT}',[ChatController::class,'send'])->name('send');

Route::post('/chatwith',[ChatController::class,'chatwith'])->name('chatwith');
Route::post('/chat_delete/{ID_HT}', [ChatController::class,'delete_chat'])->name('chat.delete');




//admin
Route::get('/admin_news', [AdminController::class,'confirm_new']);
Route::post('/admin_news/2', [AdminController::class,'upload'])->name('status.new');
Route::post('/admin_news/3', [AdminController::class,'tuchoi'])->name('status_tuchoi');

//admin_taikhoan
Route::get('/admin_taikhoan', [AdminController::class,'qltaikhoan']);
//tài chính
Route::get('/admin_giaodich', [AdminController::class,'taichinh']);
Route::post('/delete_giaodich', [AdminController::class,'deletetk'])->name('delete.tk');

//xóa tài khoản người dùng
Route::post('/delete_taikhoan', [AdminController::class,'delete_taikhoan'])->name('delete.taikhoan');
// check_new
Route::get('/check/{ID_TIN}', [AdminController::class,'check_news'])->name('check.new');

Route::get('/thongke', [AdminController::class,'thongke']);

// showviews
Route::get('/admin', [AdminController::class, 'showAdminHome'])->name('admin_home');

//Map
Route::get('/map', [MapController::class,'show_marker'])->name('map');

Route::post('/search_map', [MapController::class,'search_map'])->name('search.map');

//detail_danhgia
Route::get('/detail_danhgia',[ReviewController::class,'header']);

//thanhtoan đơn thuê

Route::post('/payment', [PaymentController::class, 'createPayment'])->name('payment.create');
Route::get('/payment-return', [PaymentController::class, 'paymentReturn'])->name('payment.return');

//thanh toán phí sàn

Route::post('/payment-create', [PaymentController::class, 'Payment'])->name('payment');
Route::get('/return', [PaymentController::class, 'Return'])->name('return');

//thanh toán số dư

Route::post('/create', [PaymentController::class, 'PaymentCreate'])->name('create.payment');
Route::get('/return_payment', [PaymentController::class, 'ReturnPayment'])->name('return.payment');


//taichinh
Route::get('/taichinh',[RevenueController::class,'showtaichinh']);
Route::post('/add_bank',[RevenueController::class,'addbank'])->name('add.bank');



//admin_user
Route::get('/thongke_user/{IDTK}', [AdminUserController::class,'thongke_user'])->name('thongke.user');
Route::get('/user_thongke/{IDTK}', [AdminUserController::class,'thongke'])->name('thongkeuser');
