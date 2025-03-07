<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent-Chi tiết</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/detail_order.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="../css/all.min.css"/>
    <script src="../jss/danhgia.js"></script>
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
                    src="../images/qr_code.png"
                    alt="QR Code"
                    class="header__qr-img"/>
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
               
            <div class="header__search " >
              
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
                <i class="header__cart-icon fas fa-shopping-cart" style="background-image: url('../images/ic/like.png'); background-size: contain;
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
      <div class="container"> 
        @foreach ($showorder as $show )
        <div class="head" onclick="window.location.href='/detail/{{ $show->ID_TIN }}';">  
        <li class="news">
          <img
            src="{{asset($show->DUONGDAN)}}" alt="" class="news-img" style="cursor: pointer;" method="post"/>
                <div class="header__cart-item-info">
                  <div class="neworder"  style="cursor: pointer;" method="post">
                    <h5 class="tieude">
                            {{$show->TIEUDE}}
                    </h5>
                    <div class="price">
                      <span class="price-day">{{$show->PRICE}}VNĐ/Ngày</span> 
                    </div>
                  </div>
                  <div class="header__cart-item-body">
                      <span class="header__cart-item-description"></span >
                  </div>
                </div> 
            </li>
        </div>  
        @endforeach 

        <div class="summary">  
            <div class="row">  
                <span class="name">Ngày thuê</span>  
                <span class="price">{{ \Carbon\Carbon::parse($show->TGTHUE)->format('d/m/Y') }}</span>  
            </div>  
            <div class="row">  
                <span class="name">Ngày trả</span>  
                <span class="price">{{\Carbon\Carbon::parse($show->TGTRA)->format('d/m/Y')}}</span>  
            </div>  
            <div class="row">  
                <span class="name">Tổng giá thuê</span>  
                <span class="price discount">{{$show->TOTAL}} VNĐ</span>  
            </div>  
            <div class="row">  
                <span class="name">Lời nhắn </span>  
                <span class="price discount">{{$show->LOINHAN}}</span>  
            </div>  
            <div class="row total">  
                <span class="name">Thành tiền</span>  
                <span class="price total-price">{{$show->TOTAL}} VNĐ</span>  
            </div>  
        </div>  

        <div class="payment-method">  
            <p>Phương thức Thanh toán</p>  
            <p>{{$show->TEN_PPTT}}</p> 
            <P>Trạng thái: {{$show->ttgiaodich}}</P>
        </div>  
        
        @if($show->ID_TT == 1)
        <div class="payment-method">  
        <button  id="cancelButton"  class="confirm">Hủy</button>

        <button class="confirm" disabled style="background-color: gray; margin-top: 10px;">Chờ xác nhận</button>
        </div> 

         <!-- Modal -->
     <form action="{{ route('confirm.huy') }}" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="ID_ORDER" value="{{$show->ID_ORDER}}">
        <div class="overlay1" id="cancelModal" tabindex="-1" style="display: none;" >
            <div class="modal-dialog1">
               <div class="modal-content">                                     
                    <div class="modal-body">
                        <form id="cancelForm">
                            <div class="mb-3">
                               <h2>Lý do hủy</h2>
                                <input type="text" name="noidung" class="form-control" id="reasonInput" placeholder="Nhập lý do hủy" required>
                            </div>
                        </form>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="confirmCancel">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>  
</form>   
<!-- ----------------------------------------------------------------->

        
        <form action="{{ route('confirm.buy') }}" method="POST">
        @csrf
        <input type="hidden" name="EMAIL" value="{{$show->EMAIL}}">
        <input type="hidden" name="ID_ORDER" value="{{$show->ID_ORDER}}">
        <input type="hidden" name="ID_TT" value="{{$show->ID_TT}}">
        @elseif($show->ID_TT == 2) 
        <div class="payment-method">  
        <button class="confirm" style="font-weight: bold;">Hoàn thành</button>
        </div> 
        </form>
        <div class="payment-method">  
        <a class="confirm" style="background-color: #0000ae;" href="{{ route('hopdong', ['ID_ORDER' => $show->ID_ORDER]) }}">Xem hợp đồng</a>
        </div>
        @elseif($show->ID_TT == 3) 
        <div class="payment-method">  
            <button class="confirm">Đánh giá</button>
        </div> 
        @elseif($show->ID_TT == 4) 
        <div class="payment-method">  
            <button class="confirm">Sửa đánh giá</button>
        </div> 

        @elseif($show->ID_TT == 5) 
        <div class="payment-method">  
            <span class="price total-price">Lý do hủy</span>
            @foreach ($lydohuy as $huy )
            <span> {{$huy->NOIDUNG}}</span>
            @endforeach
        </div> 
        @endif

    </div>  

    <script>
    function confirmAction() {
        if (confirm("Đồng nghĩa với việc hợp đồng thuê xe sẽ được tạo")) {
            // Replace the following line with the function you want to execute
            sendNotificationAndExecute();
        }
    }

    function sendNotificationAndExecute() {
        // Code to send the notification
        // Then, code to perform the desired function
        alert("Hợp đồng đã được tạo");
        // Add any additional code to complete the action here
    }
</script>
