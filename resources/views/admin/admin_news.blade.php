<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Quản Lý Tin</title>
    <link rel="icon" href="images/logo2.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/admin/bootstrap.css">

    <link rel="stylesheet" href="../css/admin/bold.css">

    <link rel="stylesheet" href="../css/admin/perfect-scrollbar.css">
    <link rel="stylesheet" href="../css/admin/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/order.css" />
    <script src="../jss/tatthongbao.js"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/admin"><img src="../images/logo3.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }} ">
                            <a href="{{URL::to('/admin')}}" class='sidebar-link'>
                                <i class="material-icons">dashboard</i>
                                <span>Trang Chủ</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_news') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_news')}}" class='sidebar-link'>
                                <i class="material-icons">description</i>
                                <span>Quản lý tin</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_taikhoan') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_taikhoan')}}" class='sidebar-link'>
                                <i class="material-icons">account_circle</i>
                                <span>Quản lý tài khoản</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_giaodich') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_giaodich')}}" class='sidebar-link'>
                                <i class="material-icons">paid</i>
                                <span>Giao dịch</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_thongke') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_thongke')}}" class='sidebar-link'>
                                <i class="material-icons">equalizer</i>
                                <span>Thống kê</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Duyệt tin đăng</h3>
            </div>
            <div class="page-content">
            @if(isset($comfirm_news) && count($comfirm_news) > 0)
                  @foreach($comfirm_news as $key => $news)
                  <div class="contain" style="margin-left: 10px;margin-right: 200px;">  
                    <div class="orders">  
                      <img src="{{asset($news->avt)}}" alt="" class="header__navbar-user-img" style="width: 20px;" />
                      <span class="shop-name" style="margin-left: -580px;">{{$news->HOTEN}}</span>  
                      <button  onclick="window.location.href='/check/{{ $news->ID_TIN }}';" class="view-shop-button">Xem Tin</button>  
                    </div>  
                    <div class="product-info">  
                      <img  onclick="window.location.href='/check/{{ $news->ID_TIN }}';" src="{{ asset($news->DUONGDAN) }}" alt="Sản phẩm" class="product-image">  <!-- Make sure 'DUONGDAN' is correct -->
                      <div class="product-details">  
                        <h2 class="product-title">{{ $news->TIEUDE }}</h2>  
                        <p class="category">Vị Trí : {{ $news->VITRI }}</p> 
                        <p class="quantity">Đã gữi: {{timeAgo($news->timepost) }}</p>  
                       
                        <div class="price-info">  
                          <span class="original-price">{{ $news->original_price ?? '' }}</span>  
                          <span class="discounted-price">{{ number_format($news->PRICE )}}/VNĐ</span> 
                        </div>  
                      </div>  
                    </div>  
                    <div class="foot">  
                      <p class="total" style="color:black;" >Thành tiền: <span class="total-amount" style="color: red;">{{ number_format($news->PRICE * ($news->quantity ?? 1)) }}đ</span></p>  
                      <form action="{{ route('status.new') }}" method="POST">
                      @csrf

                      @if(session('success'))  
                      <div class="alert alert-success" >{{ session('success') }}</div>  
                      @endif  

                       @if(session('error'))  
                        <div class="alert alert-danger" >{{ session('error') }}</div>  
                      @endif
                      <input type="hidden" name="ID_TIN" value="{{$news->ID_TIN}}">
                      <button class="confirm-button">Phê Duyệt</button>
                     
                      </form>  
                      
                      <form action="{{ route('status_tuchoi') }}" method="POST">
                      @csrf

                      @if(session('thanhcong'))  
                      <div class="alert alert-success" >{{ session('thanhcong') }}</div>  
                      @endif  

                       @if(session('loi'))  
                        <div class="alert alert-danger" >{{ session('loi') }}</div>  
                      @endif
                      <input type="hidden" name="ID_TIN" value="{{$news->ID_TIN}}">
                      <button class="confirm-button">Từ chối</button>
                     
                      </form> 
                    </div>  
                  </div>  
                  @endforeach
                @else
                  <p class="pp">Chưa có bài đăng nào</p>
                @endif
                    
            </div>
        </div>
    </div>
    <script src="../js/admin/perfect-scrollbar.min.js"></script>
    <script src="../js/admin/bootstrap.bundle.min1.js"></script>

    <script src="../js/admin/apexcharts.js"></script>
    <script src="../js/admin/dashboard.js"></script>

    <script src="../js/admin/main1.js"></script>
</body>



</html>