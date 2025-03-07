<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Duyệt Tin</title>
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
    <script src="../jss/tatthongbao.js"></script>
</head>

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

                        <li class="sidebar-item active ">
                            <a href="{{URL::to('/admin')}}" class='sidebar-link'>
                                <i class="material-icons">dashboard</i>
                                <span>Trang Chủ</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{URL::to('/admin_news')}}" class='sidebar-link'>
                                <i class="material-icons">description</i>
                                <span>Quản lý tin</span>
                            </a>
                            
                        </li>

                        <li class="sidebar-item">
                            <a href="{{URL::to('/admin_taikhoan')}}" class='sidebar-link'>
                                <i class="material-icons">account_circle</i>
                                <span>Quản lý tài khoản</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{URL::to('/admin_giaodich')}}" class='sidebar-link'>
                                <i class="material-icons">paid</i>
                                <span>Giao dịch</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="#" class='sidebar-link'>
                                <i class="material-icons">equalizer</i>
                                <span>Thống kê</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

      
      <div>
      @foreach($check_new as $key => $check)
        <div class="product-card">
          <h5 class="product-title">Ảnh xe</h5>
          <div class="product-image">
            <img src="{{asset($check->DUONGDAN)}}" alt="Honda Blade" />
          </div>
          <h5 class="product-title">Ảnh giấy tờ xe</h5>
          <div class="product-image">
            <img src="{{asset($check->giayxe)}}" alt="Honda Blade" />
          </div>

          <div class="product-details">
            <h2 class="product-title">{{$check->TIEUDE}}</h2>
            <p class="product-price">{{number_format($check->PRICE)}}/Ngày</p>
            <div class="product-author">
              <p><strong>Thông tin chi tiết</strong></p>
            </div>
            <ul class="product-info">
              <li><strong>Tình trạng:</strong> {{$check->TenTTX}}</li>
              <li><strong>Loại xe:</strong>{{$check->TEN_LOAI}}</li>
              <li><strong>Tên xe:</strong> {{$check->TENXE}}</li>
              <li><strong>Màu xe:</strong>{{$check->MAUXE}}</li>
              <li><strong>Năm đăng ký:</strong>{{$check->NGAYMUA}}</li>
              <li><strong>Loại xe:</strong> {{$check->TEN_LOAI}}</li>
              <li><strong>Biển số xe:</strong> {{$check->BIENSO}}</li>
              <li><strong>Giá thuê</strong>{{$check->PRICE}}</li>
              <li><strong>Địa chỉ:</strong> {{$check->ten_phuong_xa}},{{$check->ten_quan_huyen}},Cần Thơ</li>
              <li><strong>Thông tin :</strong>{{$check->THONGTIN}}</li>
            </ul>
            @if(session('thanhcong'))  
                <div class="alert alert-success" >{{ session('thanhcong') }}</div>  
            @endif  

            @if(session('loi'))  
                <div class="alert alert-danger" >{{ session('loi') }}</div>  
            @endif

            @if(session('success'))  
                <div class="alert alert-success" >{{ session('success') }}</div>  
            @endif  

            @if(session('error'))  
                <div class="alert alert-danger" >{{ session('error') }}</div>  
            @endif
            <div class="product-actions">
              <form action="{{ route('status_tuchoi') }}" method="POST">
                @csrf
                <input type="hidden" name="IDTTT" value="{{$check->IDTTT}}">
                <input type="hidden" name="ID_TIN" value="{{$check->ID_TIN}}">
                @if($check->IDTTT == 1)
                <button class="btn-edit">Từ chối</button>
                @else
                <button style="background-color: #a09f9f9c;  color: black;" class="btn-edit" disabled>Từ chối</button>
                @endif
                
              </form>
              <form action="{{ route('status.new') }}" method="POST">
                @csrf
                <input type="hidden" name="IDTTT" value="{{$check->IDTTT}}">
                <input type="hidden" name="ID_TIN" value="{{$check->ID_TIN}}">
                @if($check->IDTTT == 1)
                <button class="btn-post">Duyệt tin</button>
                @else
                <button class="btn-post"style="background-color: #a09f9f9c; color: black;" disabled>Duyệt tin</button>
                @endif
              </form>
              
            </div>
          </div>
        </div>
        @endforeach
        </div>
        
        
      </div>
    
<style>

  body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 20px;
}

.product-card {
  width: 600px;
  background: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
  margin: 0 auto;
}

.product-image img {
  width: 100%;
  height: auto;
}

.product-details {
  padding: 20px;
}

.product-title {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;
}

.product-price {
  color: #e74c3c;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 15px;
}

.product-author p {
  margin: 0;
  font-size: 14px;
  color: #555;
}

.product-description {
  margin: 15px 0;
  color: #666;
}

.product-info {
  list-style: none;
  padding: 0;
  margin: 0;
}

.product-info li {
  margin-bottom: 8px;
  color: #555;
  font-size: 14px;
}

.product-info strong {
  color: #333;
}

.product-actions {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}

.btn-edit,
.btn-post {
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
}


.btn-edit {
  background-color: #f39c12;
  color: #fff;
}

.btn-post {
  background-color: #e74c3c;
  color: #fff;
}

.btn-edit:hover {
  background-color: #d78d0d;
}

.btn-post:hover {
  background-color: #d62c1a;
}

</style>