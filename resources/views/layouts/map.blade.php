<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent-Map</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/review/map.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/product-detail.css" type="text/css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="../css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="../jss/thanhtoan.js"></script>
    <script src="../jss/tatthongbao.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  
</head>
<header class="header">
        <div class="grid wide">
          <nav class="header__navbar hide-on-mobile-tablet">
            <ul class="header__navbar-list">
              <li
                class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate"
              >
                Hello
        
        <!-- Header QR Code -->
                <div class="header__qr">
                  <img
                    src="images/qr_code.png"
                    alt="QR Code"
                    class="header__qr-img"/>
                  <div class="header__qr-apps">
                    <a href="" class="header__qr-link">
                      <img
                        src="images/google_play.png"
                        alt="Google Play"
                        class="header__qr-download-img"/>
                    </a>
                    <a href="" class="header__qr-link">
                      <img
                        src="images/appstore.png"
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
                          <span class="header__notify-name"
                            >Mỹ phẩm Ohui chính hãng</span>
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
                          class="header__notify-img"/>
                        <div class="header__notify-info">
                          <span class="header__notify-name"
                            >Xác thực chính hãng nguồn gốc các sản phẩm
                            Ohui</span>
                          <span class="header__notify-description"
                            >Xác thực chính hãng nguồn gốc các sản phẩm
                            Ohui</span>
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
                    <a  href="{{URL::to('/order_buy')}}" method="post">Đơn thuê</a>
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
              <form action="{{route('search.key')}}" method="POST">
                @csrf
                <input 
                  name="keywordsubmit"
                  type="text"
                  class="header__search-input"
                  placeholder="Nhập để tìm kiếm xe"/>
                </form>

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
                    <form action="{{ route('search.delete') }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');"></form>
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
              <button  type="submit" class="header__search-btn">
                <i class="material-icons" style="color:while">search</i>
              </button>
            </div>

            <!-- Cart layout -->
            <div class="header__cart">
              <div class="header__cart-wrap">
                <i class="header__cart-icon fas fa-shopping-cart" style="background-image: url('../images/ic/like.png'); background-size: contain;
  background-repeat: no-repeat;"></i>
              
               
                <span class="header__cart-notice">{{$count}}</span>
                
                <!-- No cart : header__cart-list--no-cart -->
                <div class="header__cart-list ">
                  <!-- Nocart -->
                  <img
                    src="../images/no-cart.png"
                    alt="No Cart"
                    class="header__cart-no-cart-img"/>
                  <span class="header__cart-list-no-cart-msg">
                    Chưa có sản phẩm
                  </span>
                  <!-- Hascart -->
                  <h4 class="header__cart-heading">Tin đã lưu</h4>
                  <!-- Cart item -->
                  <ul class="header__cart-list-item">
                  @if(isset($getlike_byuser)&& count($getlike_byuser) > 0)
                  @foreach($getlike_byuser as $key => $like)
                    <li class="header__cart-item" >
                      <img
                        src="../{{$like->DUONGDAN}}"
                        alt=""
                        class="header__cart-img" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post"/>
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post">
                          <h5 class="header__cart-item-name">
                            {{$like->TIEUDE}}
                          </h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price"
                              >{{number_format($like->PRICE)}}VNĐ</span>
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-description"
                            ></span>
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
                  <a href="#" class="header__cart-view-cart btn btn--primary"
                    >Xem tin đã lưu</a>
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
    <!-- end header -->
    <div class="container">
    <div class="map" id="map" >
      <div class="container-fluid">
        <h3>Địa chỉ trên bản đồ</h3>
        <div class="info">
          <div class="col">
          </div>
        </div>
      </div>
    </div>
    <div class="input-container">  
        <h3>Nhập thông tin tìm kiếm</h3>  
        <form action="{{ route('search.map') }}" method="POST">       
            @csrf
             
            <input name="vitri" type="vitri" id="vitri" placeholder="Nhập địa chỉ cụ thể" >  
            
            
            <label for="options">Chọn quận/huyện:</label>  
                <select id="quanhuyen" name="quanhuyen">  
                   <option value="">-- Chọn Quận/Huyện --</option>
                  @foreach ($getQuanHuyen as $qh )
                    <option value="{{$qh->id}}">{{$qh->ten_quan_huyen}}</option>    
                  @endforeach
                </select>  
                <select id="phuongxa" name="phuongxa">               
                    <option value="">--Chọn phường/xã--</option>    
                </select>  

            <button type="submit">Tìm kiếm</button>  
        </form>  
    </div>  
</div>  
  
    
    
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const initialLat = 10.0299;
    const initialLng = 105.7684;

    const map = L.map("map").setView([initialLat, initialLng], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: '© OpenStreetMap contributors',
    }).addTo(map);

    const newsofmap = @json($newsofmap); 
    const detailRouteBase = "{{ route('detail', ':id') }}"; 

   
    function geocodeAddress(address, callback) {
      const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;
      fetch(url)
        .then(response => response.json())
        .then(data => {
          if (data && data.length > 0) {
            const lat = parseFloat(data[0].lat);
            const lon = parseFloat(data[0].lon);
            callback(null, { lat, lon });
          } else {
            callback("Không tìm thấy tọa độ", null);
          }
        })
        .catch(error => callback(error, null));
    }

    newsofmap.forEach(item => {
      const fullAddress = `${item.VITRI}, ${item.ten_phuong_xa}, ${item.ten_quan_huyen}, Cần Thơ`;

      geocodeAddress(fullAddress, (error, coords) => {
        if (error) {
          console.error(`Lỗi khi xử lý địa chỉ "${fullAddress}":`, error);
          return;
        }

        // Tạo marker
        const marker = L.marker([coords.lat, coords.lon], { draggable: false })
          .addTo(map)
          .bindPopup(`
            <strong>ID TIN:</strong> ${item.ID_TIN}<br>
            <strong>Địa chỉ:</strong> ${fullAddress}<br>
            <button onclick="window.location.href='${detailRouteBase.replace(':id', item.ID_TIN)}'">
              Xem chi tiết
            </button>
          `);

        // Thêm sự kiện click
        marker.on("click", function () {
          const detailUrl = detailRouteBase.replace(':id', item.ID_TIN);
          window.location.href = detailUrl;
        });
      });
    });
    // Thêm marker vị trí hiện tại màu đỏ
  const currentLocationMarker = L.marker([initialLat, initialLng], {
      draggable: true,
      icon: L.icon({
        iconUrl: '../images/marker.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
      }),
    })
      .addTo(map)
      .bindPopup("Vị trí hiện tại")
      .openPopup();

    // Cập nhật vị trí marker hiện tại khi người dùng kéo thả
    currentLocationMarker.on("dragend", function (e) {
      const { lat, lng } = e.target.getLatLng();
      currentLocationMarker.setPopupContent(`Vị trí mới: ${lat.toFixed(4)}, ${lng.toFixed(4)}`).openPopup();
    });
  });
</script>





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
                            console.log("Dữ liệu trả về từ server:", data); // Kiểm tra dữ liệu trả về
                            $.each(data, function(key, phuong) {
                                $('#phuongxa').append('<option value="' + phuong.id + '">' + phuong.ten_phuong_xa + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log("Lỗi:", error); // Log lỗi nếu có
                        }
                    });
                }
            });
        </script>


