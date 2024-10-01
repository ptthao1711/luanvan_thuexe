
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent-Home</title>
    <link rel="icon" href="images/logo2.png">
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="css/all.min.css"
    />
</head>
<body>
  <div class="app">
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
                    class="header__qr-img"
                  />
                  <div class="header__qr-apps">
                    <a href="" class="header__qr-link">
                      <img
                        src="images/google_play.png"
                        alt="Google Play"
                        class="header__qr-download-img"
                      />
                    </a>
                    <a href="" class="header__qr-link">
                      <img
                        src="images/appstore.png"
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
                          src="images/ic/bell.png"
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
              if(isset($_SESSION['email']) || isset($_SESSION['password'])) {
                echo '';
                // Nếu đã đăng nhập,hiển thị nút tài khoản
                
            } else {
                // Nếu chưa đăng nhập, hiển thị nút đăng nhập
                echo '<li
                        class="header__navbar-item header__navbar-item--strong header__navbar-item--separate"
                      >
                        Đăng ký
                      </li>';
                echo '<li class="header__navbar-item header__navbar-item--strong">
                        Đăng Nhập
                      </li>';
            }
              ?>
              <li class="header__navbar-item header__navbar-user">
                <img                
                  src="<?php $avt = Session::get('avt');
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
                    <a href="">Tài khoản của tôi</a>
                  </li>
                  <li class="header__navbar-user-item">
                    <a href="">Địa chỉ của tôi</a>
                  </li>
                  <li class="header__navbar-user-item">
                    <a href="">Đơn mua</a>
                  </li>
                  <li
                    class="header__navbar-user-item header__navbar-user-item--separate"
                  >
                    <a href="{{URL::to('/home')}}" method="post" name="logout">Đăng xuất</a>
                  </li>
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
              <a href="/" class="header__logo-link">
                <img src= "images/logo.png" class="header__logo-img">
              </a>
            </div>
            <input
              type="checkbox"
              hidden
              id="mobile-search-checkbox"
              class="header__search-checkbox"
            />
            <!-- Header Search -->
            <div class="header__search ">
              <div class="header__search-input-wrap">
                <input
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
                    <li class="header__search-history-item">
                      <a href="">Xe số</a>
                    </li>
                    <li class="header__search-history-item">
                      <a href="">Xe ga</a>
                    </li>
                  </ul>
                </div>
              </div>
              <button class="header__search-btn">
                <i class="material-icons" style="color:while">search</i>
              </button>
            </div>

            <!-- Cart layout -->
            <div class="header__cart">
              <div class="header__cart-wrap">
                <i class="header__cart-icon fas fa-shopping-cart" style="background-image: url('images/ic/like.png'); background-size: contain;
  background-repeat: no-repeat;"></i>
                <span class="header__cart-notice">3</span>
                <!-- No cart : header__cart-list--no-cart -->
                <div class="header__cart-list ">
                  <!-- Nocart -->
                  <img
                    src="images/no-cart.png"
                    alt="No Cart"
                    class="header__cart-no-cart-img"
                  />
                  <span class="header__cart-list-no-cart-msg">
                    Chưa có sản phẩm
                  </span>
                  <!-- Hascart -->
                  <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                  <!-- Cart item -->
                  <ul class="header__cart-list-item">
                  @if(isset($getlike_user)&& count($getlike_user) > 0)
                  @foreach($getlike_user as $key => $like)
                    <li class="header__cart-item">
                      <img
                        src="{{$like->DUONGDAN}}"
                        alt=""
                        class="header__cart-img"
                      />
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                          <h5 class="header__cart-item-name">
                            {{$like->TIEUDE}}
                          </h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price"
                              >{{$like->PRICE}}</span
                            >
                            <span class="header__cart-item-multiply">x</span>
                            <span class="header__cart-item-qnt">2</span>
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-description"
                            >Phân loại : Bạc</span
                          >
                          <span class="header__cart-item-remove">Xóa</span>
                        </div>
                      </div>
                    </li>
                    @endforeach
                    @else
                    <p>Khoong co du kieu</p>
                    @endif
                    <li class="header__cart-item">
                      <img
                        src="https://img.tickid.vn/photos/resized/320x/83-1580887317-myphamohui-lgvina.png"
                        alt=""
                        class="header__cart-img"
                      />
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                          <h5 class="header__cart-item-name">
                            Set dưỡng ẩm whoo vàng
                          </h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price"
                              >3.105.000đ
                            </span>
                            <span class="header__cart-item-multiply">x</span>
                            <span class="header__cart-item-qnt">1</span>
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-description"
                            >Phân loại : MD</span
                          >
                          <span class="header__cart-item-remove">Xóa</span>
                        </div>
                      </div>
                    </li>
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
                            <span class="header__cart-item-multiply">x</span>
                            <span class="header__cart-item-qnt">3</span>
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
                    >Xem giỏ hàng</a
                  >
                </div>
              </div>
              <button  href="..views\login.blade.php" class="buttuon_head" style="  background: #ffffff;
    border-color: #101090;
    text-align: center;
    width: 90px;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 9px;
    font-size: 13px;
    font-weight: bold;"> ĐĂNG TIN</button>

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
    <div class="app__container">
        <div class="grid wide">
          <div class="row sm-gutter app__content">
            <!-- Category -->
            <div class="col l-2 m-0 c-0">
              <nav class="category">
                <h3 class="category__heading">
                  Danh mục
                </h3>   
                <ul class="category-list">
                  <li class="category-item category-item--active">                    
                    <a href="#" class="category-item__link">Xe Tay Ga</a>  
                  </li>
                  <li class="category-item category-item--active">                    
                    <a href="#" class="category-item__link">Xe Số</a>                   
                  </li>
                  <li class="category-item category-item--active">                    
                    <a href="#" class="category-item__link">Xe Điện</a>                   
                  </li>
                  <li class="category-item category-item--active">                    
                    <a href="#" class="category-item__link">Ô Tô</a>                   
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col l-10 m-12 c-12">
              <!-- Filter -->
              <div class="home-filter hide-on-mobile-tablet">
                <span class="home-filter__label">Sắp xếp theo</span>
                <button class="home-filter__btn btn">Phổ biến</button>
                <button class="home-filter__btn btn btn--primary">
                  Mới nhất
                </button>
                <button class="home-filter__btn btn">Bán chạy</button>
                <div class="select-input">
                  <span class="select-input__label">Giá</span>
                  <i class="material-icons">keyboard_arrow_down</i>
                  <!-- List option -->
                  <ul class="select-input__list">
                    <li class="select-input__item">
                      <a href="#" class="select-input__link"
                        >Giá: Thấp đến Cao</a
                      >
                    </li>
                    <li class="select-input__item">
                      <a href="#" class="select-input__link"
                        >Giá: Cao đến Thấp</a
                      >
                    </li>
                  </ul>
                </div>
                <div class="home-filter__page">
                  <span class="home-filter__page-num">
                    <span class="home-filter__page-current">1</span>/10
                  </span>

                  <div class="home-filter__page-control">
                    <a
                      href=""
                      class="home-filter__page-btn home-filter__page-btn--disabled"
                    >
                      <i class="material-icons">navigate_before</i>
                    </a>
                    <a href="" class="home-filter__page-btn">
                      <i class="material-icons">navigate_next</i>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Mobile Category -->
              <nav class="mobile-category">
                <ul class="mobile-category__list">
                  <li class="mobile-category__item">
                    <a href="#" class="mobile-category__link">Xe Tay Ga</a>
                  </li>
                  <li class="mobile-category__item">
                    <a href="#" class="mobile-category__link">Xe Số</a>
                  </li>
                  <li class="mobile-category__item">
                    <a href="#" class="mobile-category__link">Xe Ô Tô</a>
                  </li>
                  <li class="mobile-category__item">
                    <a href="#" class="mobile-category__link">Xe Điện</a>
                  </li>
                  <li class="mobile-category__item">
                    <a href="#" class="mobile-category__link">Xe Đạp</a>
                  </li>
                
                </ul>
              </nav>
              <!-- Product -->
              <div class="home-product">
                <div class="row sm-gutter">
                  <!-- Product item -->
                   
                  <?php  
function timeAgo($datetime) {  
      
    // Chuyển đổi thời gian đã cho thành timestamp  
    $timestamp = strtotime($datetime);  
    // Thời gian hiện tại  
    $now = time();  
    // Tính toán khoảng thời gian  
    $diff = $now - $timestamp;  

    // Xác định đơn vị thời gian  
    if ($diff < 60) {  
        return $diff . ' giây trước';  
    } elseif ($diff < 3600) { // 60 giây * 60 phút  
        $minutes = floor($diff / 60);  
        return $minutes . ' phút trước';  
    } elseif ($diff < 86400) { // 60 giây * 60 phút * 24 giờ  
        $hours = floor($diff / 3600);  
        return $hours . ' giờ trước';  
    } elseif ($diff < 604800) { // 60 giây * 60 phút * 24 giờ * 7 ngày  
        $days = floor($diff / 86400);  
        return $days . ' ngày trước';  
    } else {  
        $weeks = floor($diff / 604800);  
        return $weeks . ' tuần trước';  
    }  
}  

 
?>
                  @if(isset($allcategorynews) && count($allcategorynews) > 0)  
                  @foreach($allcategorynews as $news)
                  <div class="col l-2-4 m-4 c-6">
                    <a href="#" class="home-product-item">
                      <div
                        name ="anhtin"
                        class="home-product-item__img"
                        style="background-image: url('{{ asset($news->DUONGDAN) }}');"
                        
                      ></div>
                      <h4 class="home-product-item__name" name="tieude">
                        {{ $news->TIEUDE}}
                      </h4>
                      <div class="home-product-item__price">
                        <span class="home-product-item__price-old"
                          >230000</span
                        >
                        <span name="price" class="home-product-item__price-current"
                          >{{ $news->PRICE}}</span
                        >
                      </div>
                      <div class="home-product-item__action">
                        <span
                          class="home-product-item__like home-product-item__like--liked"
                        >
                          <i
                            class="home-product-item__like-icon-empty far fa-heart"
                          ></i>
                          
                        </span>
                        <div class="home-product-item__rating">
                          
                        </div>
                        <div class="home-product-item__sold">99 Đã bán</div>
                      </div>
                      <div class="home-product-item__origin">
                        <span class="home-product-item__brand" >{{timeAgo($news->timepost)}}</span>
                        <span class="home-product-item__origin-name"
                          >{{ $news->VITRI}}</span
                        >
                      </div>
                      <div class="home-product-item__favourite">
                        <i class="fas fa-check "></i>
                        <span>Yêu thích</span>
                      </div>
                      <div class="home-product-item__sale-off">
                      <img style="margin: 9px;" width="20" alt="like" src="https://static.chotot.com/storage/chotot-icons/next/save-ad.svg">
                      </div>
                    </a>
                  </div>
                  @endforeach
                  @else
                  <p> Không có dữ liệu</p>
                  @endif
                  <div class="col l-2-4 m-4 c-6">
                    <a href="#" class="home-product-item">
                      <div
                        class="home-product-item__img"
                        style="background-image: url(images/avt/avt2.png);"
                      ></div>
                      <h4 class="home-product-item__name">
                      Cho thuê xe honda Vision 110cc Mới 95%
                      </h4>
                      <div class="home-product-item__price">
                        <span class="home-product-item__price-old"
                          >2.300.000đ</span
                        >
                        <span class="home-product-item__price-current"
                          >2.070.000đ</span
                        >
                      </div>
                      <div class="home-product-item__action">
                        <span
                          class="home-product-item__like home-product-item__like--liked"
                        >
                          <i
                            class="home-product-item__like-icon-empty far fa-heart"
                          ></i>
                          
                        </span>
                        <div class="home-product-item__rating">
                          
                        </div>
                        <div class="home-product-item__sold">99 Đã bán</div>
                      </div>
                      <div class="home-product-item__origin">
                        <span class="home-product-item__brand">Thời Gian</span>
                        <span class="home-product-item__origin-name"
                          >Cần Thơ</span
                        >
                      </div>
                      <div class="home-product-item__favourite">
                        <i class="fas fa-check "></i>
                        <span>Yêu thích</span>
                      </div>
                      <div class="home-product-item__sale-off">
                       <img src="https://static.chotot.com/storage/chotot-icons/next/save-ad.svg">
                      </div>
                    </a>
                  </div>
              </div>
              <ul class="pagination home-product__pagination">
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">
                    <i class="material-icons">navigate_before</i>
                  </a>
                </li>
                <li class="pagination-item pagination-item--active">
                  <a href="" class="pagination-item__link">1</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">2</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">3</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">4</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">5</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">...</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">14</a>
                </li>
                <li class="pagination-item">
                  <a href="" class="pagination-item__link">
                    <i class="material-icons">navigate_next</i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="grid wide footer__content">
          <div class="row">
            <div class="col l-2-4 m-4 c-6">
              <h3 class="footer__heading">CHĂM SÓC KHÁCH HÀNG</h3>
              <ul class="footer-list">
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Trung Tâm Trợ Giúp</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Hướng Dẫn Mua Hàng</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link"
                    >Chính Sách Vận Chuyển</a
                  >
                </li>
              </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <h3 class="footer__heading">VỀ CHÚNG TÔI</h3>
              <ul class="footer-list">
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Giới Thiệu Về Shop</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Tuyển Dụng</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Điều Khoản Shop</a>
                </li>
              </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <h3 class="footer__heading">DANH MỤC</h3>
              <ul class="footer-list">
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Xe Tay Ga</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Xe Số</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">Xe Hơi</a>
                </li>
              </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <h3 class="footer__heading">THEO DÕI CHÚNG TÔI TRÊN</h3>
              <ul class="footer-list">
                <li class="footer-item">
                  <a href="#" class="footer-item__link">
                    
                    Facebook</a
                  >
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">
                    
                    Instagram</a
                  >
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">
                    
                    Linkedin</a
                  >
                </li>
              </ul>
            </div>
            <div class="col l-2-4 m-8 c-12">
              <h3 class="footer__heading">VÀO CỬA HÀNG TRÊN ỨNG DỤNG</h3>
              <div class="footer__download">
                <img
                  src="images/qr_code.png"
                  alt="Download QR"
                  class="footer__dowload-qr"
                />
                <div class="footer__download-apps">
                  <a href="#" class="footer__download-app-link">
                    <img
                      src="images/google_play.png"
                      alt="Google Play"
                      class="footer__download-app-img"
                    />
                  </a>
                  <a href="#" class="footer__download-app-link">
                    <img
                      src="images/appstore.png"
                      alt="App store"
                      class="footer__download-app-img"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__bottom">
          <div class="grid wide">
            <p class="footer__text">
              @2024
            </p>
          </div>
        </div>
      </footer>

      <!-- Modal Layout
       <div class="modal">
        <div class="modal__overlay"></div>
        <div class="modal__body"> 
      <!- Register Form -->
      <!--<div class="auth-form">
            <div class="auth-form__container">
              <div class="auth-form__header">
                <h3 class="auth-form__heading">Đăng ký</h3>
                <span class="auth-form__switch-btn">Đăng nhập</span>
              </div>
              <div class="auth-form__form">
                <div class="auth-form__group">
                  <input
                    type="text"
                    class="auth-form__input"
                    placeholder="Email"
                  />
                </div>
                <div class="auth-form__group">
                  <input
                    type="password"
                    class="auth-form__input"
                    placeholder="Mật khẩu"
                  />
                </div>
                <div class="auth-form__group">
                  <input
                    type="password"
                    class="auth-form__input"
                    placeholder="Nhập lại mật khẩu"
                  />
                </div>
              </div>
              <div class="auth-form__aside">
                <p class="auth-form__policy-text">
                  Bằng việc đăng kí, bạn đã đồng ý với Shopee về
                  <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>
                  &
                  <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                </p>
              </div>
              <div class="auth-form__controls">
                <button class="btn auth-form__controls-back btn--normal">
                  TRỞ LẠI
                </button>
                <button class="btn btn--primary">ĐĂNG KÝ</button>
              </div>
            </div>
            <div class="auth-form__socials">
              <a
                href=""
                class="auth-form__socials--facebook btn btn--size-s btn--with-icon"
              >
                <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                <span class="auth-form__socials-title"
                  >Kết nối với Facebook</span
                >
              </a>
              <a
                href=""
                class="auth-form__socials--google btn btn--size-s btn--with-icon"
              >
                <i class="auth-form__socials-icon fab fa-google"></i>
                <span class="auth-form__socials-title">Kết nối với Google</span>
              </a>
            </div>
          </div> 
      <!-- Login Form -->
      <!--<div class="auth-form">
            <div class="auth-form__container">
              <div class="auth-form__header">
                <h3 class="auth-form__heading">Đăng nhập</h3>
                <span class="auth-form__switch-btn">Đăng ký</span>
              </div>
              <div class="auth-form__form">
                <div class="auth-form__group">
                  <input
                    type="text"
                    class="auth-form__input"
                    placeholder="Email"
                  />
                </div>
                <div class="auth-form__group">
                  <input
                    type="password"
                    class="auth-form__input"
                    placeholder="Mật khẩu"
                  />
                </div>
              </div>
              <div class="auth-form__aside">
                <div class="auth-form__help">
                  <a href="" class="auth-form__help-link auth-form__help-forgot">
                    Quên mật khẩu
                  </a>
                  <span class="auth-form__help-separate"></span>
                  <a href="" class="auth-form__help-link">
                    Cần trợ giúp?
                  </a>
                </div>
              </div>
              <div class="auth-form__controls">
                <button class="btn auth-form__controls-back btn--normal">
                  TRỞ LẠI
                </button>
                <button class="btn btn--primary">ĐĂNG NHẬP</button>
              </div>
            </div>
            <div class="auth-form__socials">
              <a
                href=""
                class="auth-form__socials--facebook btn btn--size-s btn--with-icon"
              >
                <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                <span class="auth-form__socials-title"
                  >Kết nối với Facebook</span
                >
              </a>
              <a
                href=""
                class="auth-form__socials--google btn btn--size-s btn--with-icon"
              >
                <i class="auth-form__socials-icon fab fa-google"></i>
                <span class="auth-form__socials-title">Kết nối với Google</span>
              </a>
            </div>
          </div>
       </div>
      </div>  -->
    </div>
  </div>
</body>
