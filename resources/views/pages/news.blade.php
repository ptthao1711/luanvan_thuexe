<html>
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>CTRent-News</title>
      <link rel="icon" href="../images/logo2.png">
      <link rel="stylesheet" href="../css/base.css" />
      <link rel="stylesheet" href="../css/main.css" />
      <link rel="stylesheet" href="../css/grid.css" />
      <link rel="stylesheet" href="../css/responsive.css" />
      <link rel="stylesheet" href="../css/news.css"/>
      <link rel="stylesheet" href="../css/bootstrap.min.css"/>
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
      <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"/>
      <link
        rel="stylesheet"
        href="../css/all.min.css"/>
      <script src="../js/scrip.js"></script>
      <script src="../jss/xulyanh.js"></script>
  </head>
  <body>
    <div class="app">
    <header class="header">
          <div class="grid wide">
            <nav class="header__navbar hide-on-mobile-tablet">
              <ul class="header__navbar-list">
                <li
                  class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                  Đóng góp ý kiến
              <!-- Header QR Code -->
                  <div class="header__qr">
                    <img
                      src="../images/qr_code.png"
                      alt="QR Code"
                      class="header__qr-img"
                    />
                    <div class="header__qr-apps">
                      <a href="" class="header__qr-link">
                        <img
                          src="../images/google_play.png"
                          alt="Google Play"
                          class="header__qr-download-img"/>
                      </a>
                      <a href="" class="header__qr-link">
                        <img
                          src="../images/appstore.png"
                          alt="App Store"
                          class="header__qr-download-img"/>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="header__navbar-item">
                  <span class="header__navbar-title--no-pointer">Kết nối</span>
                  <a href="" class="header__navbar-icon-link">
                    <i class="header__navbar-icon fab fa-facebook"></i>
                  </a>
                  <a href="" class="header__navbar-icon-link">
                    <i class="header__navbar-icon fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
              <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar-item--has-notify">
                  <a href="" class="header__navbar-item-link">
                    <i class="material-icons">notifications</i>
                    Thông báo
                  </a>
                  <div class="header__notify">
                    <header class="header__notify-header">
                      <h3>Thông báo mới nhận</h3>
                    </header>
                    <ul class="header__notify-list">
                      <li class="header__notify-item header__notify-item--viewed">
                        <a href="" class="header__notify-link">
                          <img
                            src="../images/ic/bell.png"
                            alt=""
                            class="header__notify-img"/>
                          <div class="header__notify-info">
                            <span class="header__notify-name">Mỹ phẩm Ohui chính hãng</span>
                            <span class="header__notify-description">Mô tả mỹ phẩm Ohui chính hãng</span>
                          </div>
                        </a>
                      </li>
                      <li class="header__notify-item">
                        <a href="" class="header__notify-link">
                          <img
                            src="https://img.tickid.vn/photos/resized/200x120/83-1580794352-myphamohui-lgvina.png"
                            alt=""
                            class="header__notify-img"/>
                          <div class="header__notify-info">
                            <span class="header__notify-name">Xác thực chính hãng nguồn gốc các sản phẩm Ohui</span>
                            <span class="header__notify-description">Xác thực chính hãng nguồn gốc các sản phẩmOhui</span>
                          </div>
                        </a>
                      </li>
                      <li class="header__notify-item">
                        <a href="" class="header__notify-link">
                          <img
                            src="https://img.tickid.vn/photos/resized/200x120/83-1576046204-myphamohui-lgvina.png"
                            alt=""
                            class="header__notify-img"/>
                          <div class="header__notify-info">
                            <span class="header__notify-name">Sale Sốc bộ dưỡng Ohui The First Tái tạo trẻ hóa da SALE OFF 70%</span>
                            <span class="header__notify-description">Siêu sale duy nhất 3 ngày 14-17/11/2024</span >
                          </div>
                        </a>
                      </li>
                    </ul>
                    <div class="header__notify-footer">
                      <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                    </div>
                  </div>
                </li>
                <li class="header__navbar-item">
                  <a href="" class="header__navbar-item-link">
                    <i class="material-icons">
                    help_outline
                    </i>
                    Trợ giúp
                  </a>
                </li>
                <li class="header__navbar-item">
                  <a href="" class="header__navbar-item-link">
                    <i class="material-icons">
                    translate
                    </i>
                    Tiếng Việt
                  </a>
                </li>

                <?php

                $idTK = Session::get('IDTK');
                // $avt = Session::get('avt');
                // $HOTEN = Session::get('HOTEN');
                
                if($idTK != NULL){
                  ?>
                  <li class="header__navbar-item header__navbar-user">
                  <a href="{{URL::to('/chat')}}" class="header__navbar-item-link">
                  <i class="material-icons">
                    message
                    </i>
                    Tin Nhắn
                  </li>
                    <li class="header__navbar-item header__navbar-user">
                  <img                
                    src="../<?php 
                    $avt = Session::get('avt');
                    if($avt){ echo $avt; } ?>"
                    alt=""
                    class="header__navbar-user-img"                  
                  />
                  <span class="header__navbar-user-name">
                  <?php
                  $name = Session::get('HOTEN');
                  if($name){
                  echo $name; }
                  ?>
                  </span>
                  <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-item">
                      <a href="{{URL::to('/profile')}}" method="post">Tài khoản của tôi</a>
                    </li>
                    <li class="header__navbar-user-item">
                    <a href="{{URL::to('/mynews')}}" method="post">Quản lý tin</a>
                  </li>
                    <li class="header__navbar-user-item">
                      <a href="{{URL::to('/order_sell')}}" method="post">Đơn cho thuê</a>
                    </li>
                    <li class="header__navbar-user-item">
                      <a href="{{URL::to('/order_buy')}}" method="post">Đơn thuê</a>
                    </li>
                    <li
                      class="header__navbar-user-item header__navbar-user-item--separate"
                    >
                      <a href="{{URL::to('/logout')}}" method="post" name="logout">Đăng xuất</a>
                  </li>
                  
                  <?php } else {?>
                    <li class="header__navbar-item header__navbar-item--strong header__navbar-item--separate" >
                          <a href="{{URL::to('')}}">Đăng Nhập</a>
                    </li>
                    <li class="header__navbar-item header__navbar-item--strong" >
                      <a href="{{URL::to('/dangky')}}">Đăng Ký</a>
                    </li>  
                

                  <?php }
                      ?>
                  </ul>
                </li>
              </ul>
            </nav>

            <!-- Header with Search -->
            <div class="header-with-search">
              <label for="mobile-search-checkbox" class="header__mobile-search">
                <i class="header__mobile-search-icon fas fa-search"></i>
              </label>

              <!-- Header Logo -->
              <div class="header__logo hide-on-tablet">
                <a href="/home" class="header__logo-link">
                  <img src= "../images/logo2.png" class="header__logo-img">
                </a>
              </div>
              <input
                type="checkbox"
                hidden
                id="mobile-search-checkbox"
                class="header__search-checkbox"/>
              <!-- Header Search -->
              <div class="header__search " action="{{URL::to('/search')}}" method="POST">
                
                <div class="header__search-input-wrap">
                  @csrf
                  <input   
                    name="keywordsubmit"
                    type="text"
                    class="header__search-input"
                    placeholder="Nhập để tìm kiếm sản phẩm"/>

                  <!-- Search history -->
                  <div class="header__search-history">
                    <h3 class="header__search-history-heading">
                      Lịch sử tìm kiếm
                    </h3>
                    <ul class="header__search-history-list">
                    @if(isset($getsearch) && count($getsearch) >0)
                    @foreach($getsearch as $key => $search)
                      <li class="header__search-history-item">
                        <a href="">{{$search->WORD}}</a>
                      </li>
                      
                      @endforeach
                      @endif
                      <form action="{{ route('search.delete') }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                      <li class="header__search-history-item">
                        @csrf 
                        @method('DELETE')
                        <button class="header__cart-item-remove" type="submit" style="text-align: center;
                      display: block;
                      width: 100%;
                      color:gray; font-size: 12px;
                      background: none;border: none;" href="">Xóa Lịch Sử Tìm Kiếm</button>
                      </li>
                    </form>
                    </ul>
                  </div>
                </div>
                <button  class="header__search-btn">
                  <i class="material-icons" style="color:while">search</i>
                </button>
              </div>

              <!-- Cart layout -->
              <div class="header__cart">
                <div class="header__cart-wrap">
                  <i class="header__cart-icon fas fa-shopping-cart" style="background-image: url('images/ic/like.png'); background-size: contain;background-repeat: no-repeat;"></i>
                
                
                  <span class="header__cart-notice">{{$count}}</span>
                  <!-- No cart : header__cart-list--no-cart -->
                  <div class="header__cart-list ">
                    <!-- Nocart -->
                    <img
                      src="../images/no-cart.png"
                      alt="No Cart"
                      class="header__cart-no-cart-img"
                    />
                    <span class="header__cart-list-no-cart-msg">
                      Chưa có sản phẩm
                    </span>
                    <!-- Hascart -->
                    <h4 class="header__cart-heading">Tin đã lưu</h4>
                    <!-- Cart item -->
                    <ul class="header__cart-list-item">
                    @if(isset($getlike_user)&& count($getlike_user) > 0)
                    @foreach($getlike_user as $key => $like)
                      <li class="header__cart-item">
                        <img
                          src="{{$like->DUONGDAN}}"
                          alt=""
                          class="header__cart-img" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post"/>
                        <div class="header__cart-item-info">
                          <div class="header__cart-item-head" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post">
                            <h5 class="header__cart-item-name">
                              {{$like->TIEUDE}}
                            </h5>
                            <div class="header__cart-item-price-wrap">
                              <span class="header__cart-item-price">{{$like->PRICE}}</span>                              
                            </div>
                          </div>
                          <div class="header__cart-item-body">
                            <span class="header__cart-item-description">{{timeAgo($like->timepost)}}</span >
                            <form action="{{ route('likes.delete', $like->ID_LIKE) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">  
                          @csrf  
                          @method('DELETE')  
                          <button type="submit" class="header__cart-item-remove">Xóa</button>  
                          </form>  
                          </div>
                        </div>
                      </li>
                      @endforeach
                      @else
                      <p>Không có tin</p>
                      @endif
 
                    </ul>
                    <a href="#" class="header__cart-view-cart btn btn--primary">Xem tin đã lưu</a>
                  </div>
                </div>
                <button  href="{{URL::to('/news')}}" class="buttuon_head" style="color: #101090;" onclick="window.location.href='/news'"> ĐĂNG TIN</button>

                <!-- <a class="header__cart-wrap"> Đăng Tin</a> -->
              </div>
            </div>
          </div>
        </header>
    </div>
  </body>

      <div class="container" style="width: 60%;">  
      <form action="{{ route('add.news') }}" method="POST" enctype="multipart/form-data" >
        {{ csrf_field()}}
        <h2 style="witdh:100px;"></h2>
          <h1>Hình ảnh và Video sản phẩm</h1>  
          <div class="image-upload">  
            <div class="upload-box">
              <input type="file" id="image-upload" name="image" accept="image/*"  multiple>
              <label for="image-upload">ĐĂNG TẢI ẢNH LÊN ĐÂY</label>
              <img id="image-preview" alt="Image Preview" style="display: none;">
              <button id="remove-image" style="display: none;">X</button> 
            </div>  
          </div> 

          <h2 style="witdh:100px;"></h2>
          <!-- -->
          <h1>Hình ảnh giấy tờ xe</h1>  
          <div class="image-upload">
              <div class="upload-box">
                  <input type="file" id="image-giayxe" name="giayxe" accept="image/*" multiple>
                  <label for="image-giayxe">ĐĂNG TẢI ẢNH LÊN ĐÂY</label>
                  <img id="image-preview-giayxe" alt="Image Preview" style="display: none;">
                  <button id="remove-image-giayxe" style="display: none;">X</button>
              </div> 
          </div>

<!-- script xử lý tải ảnh lên --> 
      <script>
        
        
          const imageUpload = document.getElementById('image-upload');
          const imagePreview = document.getElementById('image-preview');
          const removeImageBtn = document.getElementById('remove-image');

          imageUpload.addEventListener('change', function(event) {
              const file = event.target.files[0];
              if (file) {
                  const reader = new FileReader();
                  reader.onload = function(e) {
                      imagePreview.src = e.target.result;
                      imagePreview.style.display = 'block';
                      removeImageBtn.style.display = 'block';
                  }
                  reader.readAsDataURL(file);
              }
          });

          removeImageBtn.addEventListener('click', function() {
              imagePreview.src = '';
              imagePreview.style.display = 'none';
              removeImageBtn.style.display = 'none';
              imageUpload.value = '';
          });

         
          const imageGiayXe = document.getElementById('image-giayxe');
          const imagePreviewGiayXe = document.getElementById('image-preview-giayxe');
          const removeImageBtnGiayXe = document.getElementById('remove-image-giayxe');

          imageGiayXe.addEventListener('change', function(event) {
              const file = event.target.files[0];
              if (file) {
                  const reader = new FileReader();
                  reader.onload = function(e) {
                      imagePreviewGiayXe.src = e.target.result;
                      imagePreviewGiayXe.style.display = 'block';
                      removeImageBtnGiayXe.style.display = 'block';
                  }
                  reader.readAsDataURL(file);
              }
          });

          removeImageBtnGiayXe.addEventListener('click', function() {
              imagePreviewGiayXe.src = '';
              imagePreviewGiayXe.style.display = 'none';
              removeImageBtnGiayXe.style.display = 'none';
              imageGiayXe.value = '';
          });
      </script>

      <!-- php xử lý load ảnh -->
      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            if (!empty($_FILES['image-upload']['name'][0])) {
                foreach ($_FILES['image-upload']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['image-upload']['error'][$key] == 0) {
                        $fileName = $_FILES['image-upload']['name'][$key];
                        $fileTmpName = $_FILES['image-upload']['tmp_name'][$key];
                        
                       
                        $uploadDirectory = 'images/xe/';
                        if (!is_dir($uploadDirectory)) {
                            mkdir($uploadDirectory, 0755, true);
                        }
                        
                       
                        move_uploaded_file($fileTmpName, $uploadDirectory . $fileName);
                        echo "<p>Đã tải lên ảnh sản phẩm: $fileName</p>";
                    }
                }
            }

            
            if (!empty($_FILES['image-giayxe']['name'][0])) {
                foreach ($_FILES['image-giayxe']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['image-giayxe']['error'][$key] == 0) {
                        $fileName = $_FILES['image-giayxe']['name'][$key];
                        $fileTmpName = $_FILES['image-giayxe']['tmp_name'][$key];
                        
                        
                        $uploadDirectory = 'images/giayxe/';
                        if (!is_dir($uploadDirectory)) {
                            mkdir($uploadDirectory, 0755, true);
                        }
                        
                       
                        move_uploaded_file($fileTmpName, $uploadDirectory . $fileName);
                        echo "<p>Đã tải lên ảnh giấy tờ xe: $fileName</p>";
                    }
                }
            }
        }
        ?>
 <!-- ------------------------------------------------------------------------------------------------------------ -->

          <h2>Thông tin chi tiết</h2>  
            <!-- @csrf  --> 
              <label for="status">Tình trạng *</label>  
              <select  class="news"id="status" name="tinh_trang" required>  
              @foreach ($tinhtrang as $status)
              <option value="{{$status->ID_TTX}}">{{$status->TENTTX}}</option>  
              @endforeach
              </select>  

              <label for="hang-xe">Loại Xe *</label>  
              <select class="news" type="text" id="hang-xe" name="loai_xe" required>
              
              @foreach ($catebyid as $key => $cate)
              <option value="{{$cate->ID_LOAI}}">{{$cate->TEN_LOAI}}</option>  
              @endforeach  
                
              </select> 

              <label for="nam-dang-ky">Tên Xe</label>  
              <input class="news" type="text" id="" name="ten_xe" autocomplete="off" required>  

              <label for="loai-xe">Ngày Mua</label>  
              <input class="news"  type="date"  id="dateInput" >  

              <label for="dung-tich">Dung tích xe </label>  
              <input class="news" type="text" id="dung-tich" name ="phan_khoi" autocomplete="off" required>  

              <label for="bien-so">Biển số xe *</label>  
              <input class="news" type="text" id="bien-so" name="bienso" autocomplete="off" required>  

              <label for="xuat-xu">Màu xe *</label>  
              <input  class="news"type="text" id="xuat-xu" name="mauxe" autocomplete="off" required>  

              <h3>Tiêu đề tin đăng và Mô tả chi tiết</h3>  
              <label for="tieu-de">Tiêu đề tin đăng *</label>  
              <input class="news" type="text" id="tieu-de" name ="tieu_de" autocomplete="off" maxlength="150" required>  

              <label for="km-da-di">Giá bán/1 ngày *</label>  
              <input class="news" type="text" id="km-da-di" name="price" autocomplete="off" required>  

              <label for="quan">Quận/Huyện *</label>  
              <select class="news" id="quanhuyen" name="quanhuyen" required>
                   <option value="">-- Chọn Quận/Huyện --</option>
                  @foreach ($getQuanHuyen as $quan)
                      <option value="{{ $quan->id }}">{{ $quan->ten_quan_huyen }}</option>  
                  @endforeach 
              </select>

              <label for="phuongxa">Phường/Xã *</label>  
              <select class="news" id="phuongxa" name="phuongxa" required>   
                  <option value="">-- Chọn Phường/Xã --</option>
              </select>

<!-- script xử lý hiển thị quận huyện xã phường -->
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script>
                $('#quanhuyen').change(function() {
                var quanHuyenId = $(this).val();
                $('#phuongxa').empty().append('<option value="">-- Chọn Phường/Xã --</option>');

                if (quanHuyenId) {
                    $.ajax({
                        url: '/get_phuong_xa/' + quanHuyenId,
                        type: 'GET',
                        success: function(data) {
                            console.log("Dữ liệu trả về từ server:", data); 
                            $.each(data, function(key, phuong) {
                                $('#phuongxa').append('<option value="' + phuong.id + '">' + phuong.ten_phuong_xa + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log("Lỗi:", error); 
                        }
                    });
                }
            });
        </script>

 
 
        
<!-- ------------------------------------------------------------------------------------------------------------ -->
              <label for="xuat-xu">Địa chỉ cụ thể *</label>  
              <input  class="news"type="text" id="xuat-xu" name="diachi" autocomplete="off" placeholder=" Số nhà/tên đường/..." >  

              <label for="bien-so">Cho thuê từ ngày*</label>  
              <input class="news" type="date" id="dateInput" name="ngay_thue" required min="<?= date('Y-m-d') ?>"> 
              <div id="calendar" style="display:none;"></div> 

              
              <label for="bien-so">Ngày kết thúc *</label>  
              <input class="news" type="date" id="dateInput" name ="ngay_tra"  required min="<?= date('Y-m-d') ?>"> 
              <div id="calendar" style="display:none;"></div> 

              <label for="mo-ta">Mô tả chi tiết *</label>  
              <textarea class="news" id="mo-ta" rows="4" placeholder="Giao/nhận xe, không/có nón bảo hiểm, thông tin cụ thể ..." maxlength="500" name= "thong_tin" required></textarea>  

              <!-- <h3>Thông tin người bán</h3>  
              <label for="ten">Địa chỉ *</label>  
              <input  class="news" type="text" id="ten" required>  

              <label for="ten">Số điện thoại</label>  
              <input  class="news" type="text" id="ten" required>  -->

              @if(session('succe'))  
                <div class="alert alert-success" style="font-size: 15px;color: green;">{{ session('succe') }}</div>  
              @endif  

              @if(session('erro'))  
                <div class="alert alert-danger" style="font-size: 15px;color: green;">{{ session('erro') }}</div>  
              @endif

              <button class="name" type="button" class="preview-button">Xem trước</button>  
              <button type="submit" class="submit-button">Đăng tin</button>   
            
            
            </form>
          </div>

          </html>
            
  
