<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order_Buy</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/order.css" />
    <!-- <link rel="stylesheet" href="../css/danhgia.css" /> -->
    <script src="../jss/script.js"></script>
    <!-- <script src="../jss/danhgia.js"></script> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="../css/all.min.css"/>
    <script src="../jss/tatthongbao.js"></script>
</head>

  <div class="app">
  <header class="header">
        <div class="grid wide">
          <nav class="header__navbar hide-on-mobile-tablet">
            <ul class="header__navbar-list">
              <li
                class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate"
              >
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
                        class="header__qr-download-img"
                      />
                    </a>
                    <a href="" class="header__qr-link">
                      <img
                        src="../images/appstore.png"
                        alt="App Store"
                        class="header__qr-download-img"
                      />
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
                          class="header__notify-img"
                        />
                        <div class="header__notify-info">
                          <span class="header__notify-name"
                            >Mỹ phẩm Ohui chính hãng</span
                          >
                          <span class="header__notify-description"
                            >Mô tả mỹ phẩm Ohui chính hãng</span
                          >
                        </div>
                      </a>
                    </li>
                    <li class="header__notify-item">
                      <a href="" class="header__notify-link">
                        <img
                          src="https://img.tickid.vn/photos/resized/200x120/83-1580794352-myphamohui-lgvina.png"
                          alt=""
                          class="header__notify-img"
                        />
                        <div class="header__notify-info">
                          <span class="header__notify-name"
                            >Xác thực chính hãng nguồn gốc các sản phẩm
                            Ohui</span
                          >
                          <span class="header__notify-description"
                            >Xác thực chính hãng nguồn gốc các sản phẩm
                            Ohui</span
                          >
                        </div>
                      </a>
                    </li>
                    <li class="header__notify-item">
                      <a href="" class="header__notify-link">
                        <img
                          src="https://img.tickid.vn/photos/resized/200x120/83-1576046204-myphamohui-lgvina.png"
                          alt=""
                          class="header__notify-img"
                        />
                        <div class="header__notify-info">
                          <span class="header__notify-name"
                            >Sale Sốc bộ dưỡng Ohui The First Tái tạo trẻ hóa da
                            SALE OFF 70%</span
                          >
                          <span class="header__notify-description"
                            >Siêu sale duy nhất 3 ngày 14-17/11/2024</span
                          >
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
                <a href="" class="header__navbar-item-link">
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
              class="header__search-checkbox"
            />
            <!-- Header Search -->
            <div class="header__search " action="{{URL::to('/search')}}" method="POST">
              
              <div class="header__search-input-wrap">
                @csrf
                <input 
                  
                  name="keywordsubmit"
                  type="text"
                  class="header__search-input"
                  placeholder="Nhập để tìm kiếm sản phẩm"
                />

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
                    <li class="header__search-history-item">
                      <a href="">Xe ga</a>
                    </li>
                    <li class="header__search-history-item">
                      <a href="">Xe số</a>
                    </li>
                  </ul>
                </div>
              </div>
              <button  type="submit" class="header__search-btn">
                <i class="material-icons" style="color:while">search</i>
              </button>
            </div>

            <!-- Cart layout -->
            <div class="header__cart">
              <div class="header__cart-wrap">
                <i class="header__cart-icon fas fa-shopping-cart" style="background-image: url('asset(images/ic/like.png)'); background-size: contain;
  background-repeat: no-repeat;"></i>
              
              
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
                        src="{{asset($like->DUONGDAN)}}"
                        alt=""
                        class="header__cart-img" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post" />
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post">
                          <h5 class="header__cart-item-name">
                            {{$like->TIEUDE}}
                          </h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price"
                              >{{$like->PRICE}}</span
                            >
                            
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-description"
                            >{{timeAgo($like->timepost)}}</span >
                            
                          
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
                    
                    <li class="header__cart-item">
                      <img
                        src="https://img.tickid.vn/photos/resized/320x/83-1580884899-myphamohui-lgvina.png"
                        alt=""
                        class="header__cart-img"
                      />
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                          <h5 class="header__cart-item-name">
                            Set kem mắt hoàn lưu cao cấp
                          </h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price"
                              >11.610.000đ
                            </span>
                            
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-description"
                            >Phân loại : Tinh hoa
                          </span>
                          <span class="header__cart-item-remove">Xóa</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <a href="#" class="header__cart-view-cart btn btn--primary"
                    >Xem tin đã lưu</a
                  >
                </div>
              </div>
              <button  href="{{URL::to('/news')}}" class="buttuon_head"  onclick="window.location.href='/news'"> ĐĂNG TIN</button>

              <!-- <a class="header__cart-wrap"> Đăng Tin</a> -->
            </div>
          </div>
        </div>
        <ul class="header__sort-bar">
          <li class="header__sort-item">
            <a href="" class="header__sort-link">Liên Quan</a>
          </li>
          <li class="header__sort-item header__sort-item--active">
            <a href="" class="header__sort-link">Mới Nhất</a>
          </li>
          <li class="header__sort-item">
            <a href="" class="header__sort-link">Bán chạy</a>
          </li>
          <li class="header__sort-item">
            <a href="" class="header__sort-link">Giá</a>
          </li>
        </ul>
      </header>
      <body>
    <div class="app__container">
        <div class="grid wide">
          <div class="row sm-gutter app__content">
            <!-- Category -->
            
            <div class="col l-10 m-12 c-12">
              <!-- Filter -->
              <div class="home-filter hide-on-mobile-tablet" style="    margin-left: 100px;
    margin-right: -100px;">

                <button onclick="window.location.href='/mynews';"  method="post" class="home-filter__btn btn" style="cursor: pointer;background-color: #0900af; color: white;">Tất cả</button>
                @foreach ($status_tin as $tt)
                <a href="{{ route('mynews.id', ['idttt' => $tt->IDTTT]) }}" 
                    class="home-filter__btn btn {{ request()->route('idttt') == $tt->IDTTT ? 'btn-green' : '' }}">
                    {{$tt->TENTTT}}
                </a>
                
                @endforeach
                
              </div>
              <div class="home-filter hide-on-mobile-tablet" style="margin-left: 100px;margin-right: -100px; margin-top: 10px;margin-bottom: 10px;background-color:#80808038;">
              <input 
                  style="height: 30px; background-color: #80808017;"
                  name="keywordsubmit"
                  type="text"
                  class="header__search-input"
                  placeholder="Bạn có thể tìn kiếm theo tên Shop, ID đơn hoặc tên sản phẩm"/>
              </div>
            @if(isset($allnews) && count($allnews) > 0)
              @foreach($allnews as $key => $new)
              <div class="contain" onclick="window.location.href='/edit_news/{{$new->ID_TIN }}';" style="cursor: pointer;" method="post" >  
                
                <div class="product-info">  
                  <img src="{{ asset($new->DUONGDAN) }}" alt="Sản phẩm" class="product-image">  
                  <div class="product-details">  
                    <h2 class="product-title">{{ $new->TIEUDE }}</h2>  
                    <p class="category">Phân loại : </p> 
                    <p class="quantity">x{{ $new->quantity ?? 1 }}</p>  
                    
                    <div class="price-info">  
                      <span class="original-price">{{ $new->original_price ?? '' }}</span>  
                      <span class="discounted-price">{{ number_format($new->PRICE )}}/VNĐ</span> <!-- Use PRICE from the order -->
                    </div>  
                  </div>  
                </div>  
                <div class="foot"> 

                  @if(session('success'))  
                  <div class="alert alert-success" id="success-alert" style="font-size: 15px;color: green;margin-left: 300px;">{{ session('success') }}</div>  
                  @endif  

                  @if(session('error'))  
                  <div class="alert alert-danger" id="error-alert" style="font-size: 15px;color: green;margin-left: 300px;">{{ session('error') }}</div>  
                  @endif
                   
                  <input type="hidden" name="IDTTT" value="{{$new->IDTTT}}"> 
                  @if($new->IDTTT == 2)
                  <form action="{{route('hidden.new')}}" method="post" >
                  @csrf  
                  <input type="hidden" name="ID_TIN" value="{{$new->ID_TIN}}"> 
                  <button class="confirm-button" style="font-weight: bold;font-size: 15px;width: 100px;margin-left: 800px;" >Ẩn tin</button>
                  </form>
                  @endif
                </div>  
              </div>

              
              @endforeach
            @else
              <p class="pp">Chưa có đơn hàng nào</p>
            @endif
      </div>
      </div>
      </div>
      </div>
      </body>
      </div>

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
          </script>

  <?php  
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image-upload'])) {  
          foreach ($_FILES['image-upload']['tmp_name'] as $key => $tmp_name) {  
              if ($_FILES['image-upload']['error'][$key] == 0) {  
                  $fileName = $_FILES['image-upload']['name'][$key];  
                  $fileTmpName = $_FILES['image-upload']['tmp_name'][$key];  

                 
                  $uploadDirectory = 'images/xe/';  
                  if (!is_dir($uploadDirectory)) {  
                      mkdir($uploadDirectory, 0755, true);  
                  }  

                  move_uploaded_file($fileTmpName, $uploadDirectory . $fileName);  
                  echo "<p>Đã tải lên: $fileName</p>";  
              }  
          }  
      }  
      ?>  
      