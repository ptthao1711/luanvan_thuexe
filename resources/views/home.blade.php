<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent-Trang Chủ</title>
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
                    src="images/qr_code.png"
                    alt="QR Code"
                    class="header__qr-img"/>
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
                            >Đơn</span
                          >
                          <span class="header__notify-description"
                            >Mô tả mỹ phẩm Ohui chính hãng</span
                          >
                        </div>
                      </a>
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
                 <li  class="header__navbar-item header__navbar-user">
                <a href="{{URL::to('/chat')}}" class="header__navbar-item-link">
                <i class="material-icons">
                  message
                  </i >
                  Tin Nhắn
                </li>
                  <li class="header__navbar-item header__navbar-user">
                <img                
                  src="<?php 
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
                <img src= "images/logo2.png" class="header__logo-img">
              </a>
            </div>
            <input
              type="checkbox"
              hidden
              id="mobile-search-checkbox"
              class="header__search-checkbox"
            />
           
            <!-- Header Search -->
               
            <div class="header__search " >
              
              <div class="header__search-input-wrap">
                <form action="{{route('search.key')}}" method="POST">
                @csrf
                <input 
                  name="keywordsubmit"
                  type="text"
                  class="header__search-input"
                  placeholder="Nhập để tìm kiếm xe" autocomplete="off"/>
                </form>
                <!-- Search history -->
                <div class="header__search-history">
                  <h3 class="header__search-history-heading">
                    Lịch sử tìm kiếm
                  </h3>
                  <ul class="header__search-history-list">
                 
                  @foreach($getsearch as $key => $search)
                  <li class="header__search-history-item">
                    <a href="{{ route('search.key',  ['word' => urlencode($search->WORD)]) }}" class="select-input__link" >
                    {{ $search->WORD }} 
                    </a>
                   </li>
                  @endforeach
                    <li class="header__search-history-item">
                    <button class="header__cart-item-remove" type="submit" style="text-align: center;
                    display: block;
                    width: 100%;
                    color:gray; font-size: 12px;
                    background: none;border: none;" href="">Xóa Lịch Sử Tìm Kiếm</button>
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
                <i class="header__cart-icon fas fa-shopping-cart" style="background-image: url('images/ic/like.png'); background-size: contain;
                background-repeat: no-repeat;"></i>
              
              
                <span class="header__cart-notice">{{$count}}</span>
                <!-- No cart : header__cart-list--no-cart -->
                <div class="header__cart-list ">
                  <!-- Nocart -->
                  <img
                    src="images/no-cart.png"
                    alt="No Cart"
                    class="header__cart-no-cart-img"/>
                  <span class="header__cart-list-no-cart-msg">
                    Chưa có sản phẩm
                  </span>
                  <!-- Hascart -->
                  <h4 class="header__cart-heading">Tin đã lưu</h4>
                  <!-- Cart item -->
                  <ul class="header__cart-list-item">
                  @if(isset($getlike_user)&& count($getlike_user) > 0)
                  @foreach($getlike_user as $key => $like)
                    <li class="header__cart-item"  >
                      <img
                        src="{{asset($like->DUONGDAN)}}"
                        alt=""
                        class="header__cart-img" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post"/>
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head" onclick="window.location.href='/detail/{{ $like->ID_TIN }}';" style="cursor: pointer;" method="post">
                          <h5 class="header__cart-item-name">
                            {{$like->TIEUDE}}
                          </h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price">{{number_format($like->PRICE)}}VNĐ/Ngày</span> 
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-description"
                            >{{timeAgo($like->timepost)}}</span >
                          <form action="{{route('likes.delete', $like->ID_TIN)}}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">  
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
            <a href="" class="header__sort-link">Giá thuê</a>
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
                  @foreach ($loaixe as  $loai )
                  <li class="category-item category-item--active">                    
                    <a href="{{ route('search', ['id_loai' => $loai->ID_LOAI]) }}" class="category-item__link">{{$loai->TEN_LOAI}}</a>  
                  </li>
                  @endforeach
                </ul>
              </nav>
            </div>
            <div class="col l-10 m-12 c-12">
              <!-- Filter -->
              <div class="home-filter hide-on-mobile-tablet">
                <span class="home-filter__label">Sắp xếp theo</span>
                <button class="home-filter__btn btn btn btn--primary">Phổ biến</button>
                
                <div class="select-input"  style="margin-right: 13px;">
                  <span class="select-input__label ">Khu Vực</span>
                  <i class="material-icons">keyboard_arrow_down</i>
                  <!-- List option -->
                  <ul class="select-input__list">
                    @foreach ($quanhuyen as $quan )
                    <li class="select-input__item">
                      <a href="{{ route('search.idquan', ['idquan' =>$quan->id,]) }}" class="select-input__link"
                        >{{$quan->ten_quan_huyen}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!--//-->
                <div class="select-input"  style="margin-right: 13px;">
                  <span class="select-input__label">Tình trạng</span>
                  <i class="material-icons">keyboard_arrow_down</i>
                  <!-- List option -->
                  <ul class="select-input__list">
                    @foreach ($tinhtrang as $ttrang )
                    <li class="select-input__item">
                      <a href="{{ route('search.idttx', ['id_ttx' =>$ttrang->ID_TTX,]) }}" class="select-input__link"
                        >{{$ttrang->TenTTX}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="select-input">
                  <span class="select-input__label">Giá thuê</span>
                  <i class="material-icons">keyboard_arrow_down</i>
                  <!-- List option -->
                  <ul class="select-input__list">
                    <li class="select-input__item">
                      <a href="{{ route('search.price') }}" class="select-input__link"
                        >Giá: Thấp đến Cao</a>
                    </li>
                    <li class="select-input__item">
                      <a href="{{ route('search.price1') }}" class="select-input__link"
                        >Giá: Cao đến Thấp</a>
                    </li>
                  </ul>
                </div>
                <div class="home-filter__page">
                   
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
               
                  @if(isset($allcategorynews) && count($allcategorynews) > 0)  
                  @foreach($allcategorynews as $news)
                  <div class="col l-2-4 m-4 c-6" onclick="window.location.href='/detail/{{ $news->ID_TIN }}';" style="cursor: pointer;" method="post" >
                    <a href="#" class="home-product-item">
                      <div
                        name ="anhtin"
                        class="home-product-item__img"
                        style="background-image: url('{{ asset($news->DUONGDAN) }}');"
                        
                      ></div>
                      <h4 class="home-product-item__name" name="tieude">
                        {{$news->TIEUDE}}
                      </h4>
                      <div class="home-product-item__price">
                        
                        <span name="price" class="home-product-item__price-current"
                          >{{number_format($news->PRICE)}}VNĐ</span>
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
                        <div class="home-product-item__sold">{{$news->total_rent}} Đã thuê</div>
                      </div>
                      <div class="home-product-item__origin">
                        <span class="home-product-item__brand" >{{timeAgo($news->timepost)}}</span>
                        <span class="home-product-item__origin-name"
                          >{{ $news->ten_phuong_xa}}</span
                        >
                      </div>
                      <div class="home-product-item__favourite">
                        <i class="fas fa-check "></i>
                        <span>Phổ biến</span>
                      </div>
                      <div class="home-product-item__sale-off" >
                      <img class="img"style="margin: 9px;" width="20" alt="like" src="https://static.chotot.com/storage/chotot-icons/next/save-ad.svg">
                      </div> 
                    </a>
                  </div>
                   <!-- <?php
                      $idTin = $news->ID_TIN;
                      $idTK = Session::get('IDTK');
                      // Giả sử bạn đã có truy vấn để kiểm tra nếu ID_TIN tồn tại trong bảng 'ID_LIKE' theo 'IDTK'
                      $checkLike = DB::table('likes')
                                      ->join('thuoc_like','thuoc_like.ID_LIKE','=','likes.ID_LIKE')
                                      ->where('likes.IDTK', $idTK)  // Sử dụng giá trị từ session hoặc bất kỳ nguồn nào bạn có
                                      ->where('thuoc_like.ID_TIN', $idTin) // ID_TIN cần kiểm tra
                                      ->exists();

                      // Truyền biến kiểm tra này vào view
                      ?>
                      <script>
                      // Giả sử bạn đã truyền giá trị checkLike từ PHP sang view
                      var checkLike = <?php echo json_encode($checkLike); ?>;
                      
                      // Kiểm tra nếu checkLike là true, thì thay đổi màu nền
                      if (checkLike) {
                          document.querySelector('.img').style.backgroundColor = 'red';
                      }
                  </script> -->
                  @endforeach
                  @else
                  <p> Không có dữ liệu</p>
                  @endif
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
            <!-- <div class="col l-2-4 m-8 c-12">
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
                </div> -->
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
