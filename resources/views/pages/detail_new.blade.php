<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>CTRent-Detail</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />

    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    
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
    <!-- <script src="../jss/detail_new.js"></script> -->
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
                    src="../images/qr_code.png"
                    alt="QR Code"
                    class="header__qr-img"/>
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
                          <span class="header__cart-item-description"></span>
                          <form action="{{ route('likes.delete', $like->ID_TIN) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">  
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

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="card">
                <div class="container-fliud">
                    <!-- <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                     action="{{URL::to('/detail/'.$detail_new->ID_TIN)}}"> -->
                        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    
                                    <div class="tab-pane active" id="pic-3">
                                        <img src="{{asset($detail_new->DUONGDAN)}}">
                                    </div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">

                                    <li class="active">
                                        <a data-target="#pic-1" data-toggle="tab" class="">
                                            <img src="{{asset($detail_new->DUONGDAN1)}}">
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-2" data-toggle="tab" class="">
                                            <img src="{{asset($detail_new->DUONGDAN1)}}">
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-3" data-toggle="tab" class="active">
                                            <img src="{{asset($detail_new->DUONGDAN1)}}">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">{{$detail_new->TIEUDE}}</h3>
                                  @php  
   
                                 $mucDo = $danhgia_tin->MUCDO ?? 0; 
                                  @endphp
                                
                                <div class="rating">
                                    <div class="stars">
                                    @for($i = 1; $i <= 5; $i++) 
                                        <span class="fa fa-star {{ $i <= $mucDo ? 'checked' : '' }}"></span>
                                        @endfor
                                    </div>
                                    <span class="review-no">{{$count_tin}} review</span>
                                </div>
                                <p class="product-description">
                                <i class="material-icons" >
                                timer
                                </i>
                                
                                <span class="item-link">  Đăng {{timeAgo($detail_new->timepost)}}</span></p>
                                
                                <h4 class="price">Giá hiện tại: <span class="item-link-price"> {{number_format($detail_new->PRICE)}} vnđ/Ngày</span></h4>
                                <p class="price">Tình trạng: <span class="item-link-tt"> {{ $detail_new->TenTTX}} </span> </p>
                                <p class="price">Cho thuê từ <span class="item-link-tt"> {{\Carbon\Carbon::parse($detail_new->TGTHUE)->format('d/m/Y')}}  đến  {{\Carbon\Carbon::parse($detail_new->TGTRA)->format('d/m/Y')}} </span> </p>
                                <h5 class="sizes">Địa chỉ:
                                    <span class="item-link" data-toggle="tooltip" title="cỡ Nhỏ">{{$fullAddress}}</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Trung bình"></span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Lớn"></span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Đại"></span>
                                </h5>
                                <div class="colors">
                                <div>
                                <ul class="header__cart-list-item">
                                <li class="header__cart-item" onclick="window.location.href='/account/{{$detail_new->IDTK }}';">
                                <img
                                  src="{{asset($detail_new->avt)}}"
                                  alt=""
                                  class="header__cart-img"/>
                                <div class="header__cart-item-info">
                                <div class="header__cart-item-head">
                                <h5 class="header__cart-item-name">
                                  {{$detail_new->HOTEN}}
                                </h5>
                                <input type="hidden" name="IDTK" value="{{$detail_new->IDTK}}">
                              </div>
                              <div class="header__cart-item-body1">
                              <span class="header__cart-item-description1"
                              >Truy cập {{timeAgo($detail_new->trangthaihoatdong)}}</span>
                              <span class="item-link1">{{$countnews}} tin đăng</span>   
                            </div>
                          </div>
                          </li>
                        </ul>
                            <a class="add-to-cart btn btn-default" id="btnphone"  onclick="changeText()"> <span id="phoneNumber">Gọi điện</span></a>
                            <script>
                            function changeText() {
                                document.getElementById('phoneNumber').innerText = '{{ $detail_new->SDT }}';
                            }
                            </script>
                            <form action="{{ route('chatwith') }}" method="POST">
                            @csrf
                            <input type="hidden" name="IDTK" value="{{$detail_new->IDTK}}"> 
                            <button class="like btn btn-default" style="margin-top: 10px;"href=""><span class="fa fa-chat">CHAT</span></button> 
                            </form>   
                              </div>
                            </div>

                            <form action="{{ route('add.orders', $detail_new->ID_TIN) }}" method="POST" id="orderForm">
                            @csrf
                            <div class="form-group">
                                <label style="margin-top: 20px;" class="note" for="tinnhan">Lời nhắn :</label>
                                <input style="height: 40px;" type="text" class="form-control" id="soluong" name="loinhan">

                                <label style="margin-top: 20px;" class="note" for="bien-so">Ngày Thuê *</label>  
                                <input style="background-color: white;height: 40px;font-size: 13px;" class="form-control" type="date" id="ngay_thue" name="ngay_thue" required min="{{ $detail_new->TGTHUE }}" max="{{ $detail_new->TGTRA }}"  onchange="calculateTotalPrice()"> 

                                <div id="calendar" style="display:none;"></div> 

                                <label style="margin-top: 20px;" class="note" for="bien-so">Ngày Trả *</label>  
                                <input style="background-color: white;height: 40px;font-size: 13px;" class="form-control" type="date" id="ngay_tra" name="ngay_tra" required min="{{ $detail_new->TGTHUE }}" max="{{ $detail_new->TGTRA }}"  onchange="calculateTotalPrice()"> 

                                <div id="calendar" style="display:none;"></div> 

                                <h4 class="total-price" style="margin-top:20px;">Tổng giá thuê: <span id="totalPrice" style="color: red;" name="total">0 vnđ</span></h4>
                                <input type="hidden" id="totalPriceValue" name="total_price">
                              
                                <label class="note" style="margin-top: 20px;" for="status">Phương thức thanh toán *</label>  
                                <select style="height: 40px;font-size: 13px;"  class="form-control" id="status" name="pptt" required>  
                                @foreach ($pttt as $tt )
                                <option value="{{$tt->ID_PPTT}}">{{$tt->TEN_PPTT}}</option>  
                                @endforeach
                                </select>  

                                @if(session('success'))  
                                    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>  
                                @endif  

                                @if(session('error'))  
                                    <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>  
                                @endif
                            </div>
                            <div class="action"> 
                                <button type="submit" class="add-to-cart btn btn-default" id="btnThemVaoGioHang">
                                    <span>Yêu cầu thuê</span>
                                </button>
                            </div>                            
                          </form>
                          
                          <form  action="{{ route('payment.create') }}" method="POST" id="paymentForm">
                          @csrf
                          <div class="action1"> 
                                <input type="hidden" id="paymentTotalPriceValue" name="total_price" value="0">
                                <input type="hidden" name="id_tin" value="{{$detail_new->ID_TIN}}" >
                                <input type="hidden" name="tinnhan" id="hiddenLoiNhan" value="">
                                <input type="hidden" name="ngaythue" id="hiddenNgayThue" value="">
                                <input type="hidden" name="ngaytra" id="hiddenNgayTra" value="">
                                <input type="hidden" name="pttt" id="hiddenPptt" value="">
                                <button type="submit" class="add-to-cart btn btn-default" id="btnthanhtoan"  onclick="updateHiddenFields()"style="display: none;">
                                <span>Thanh Toán</span>
                                </button>
                            </div>
                          </form>
                                <form action="{{ route('add.like',$detail_new->ID_TIN) }}" method="POST">
                                  
                                @csrf
                                @if(session('succe'))  
   			                           <div class="alert alert-success" id="success-alert">{{ session('succe') }}</div>  
			                              @endif  
                                    @if(session('erro'))  
                                        <div class="alert alert-danger" id="error-alert">{{ session('erro') }}</div>  
                                    @endif
                              
                                      <div class="action">
                                    <button  class="like btn btn-default" href="#" type= "submit"><span class="fa fa-heart" ></span></button>
                                  </div>
                                  </form>
                                </div>      
                            </div>
                          </div>
                          <div class="fol"> 
                          <div class="card-inf">
                              <div class="container-fluid">
                                  <h3>Thông tin chi tiết về Sản phẩm</h3>
                                  <div class="info">
                                      <div class="col">
                                      {{$detail_new->THONGTIN}}
                                      </div> 
                                  </div>  
                                  <div class="danhgia">
                                  <h3 style="margin-top: -520px;">Đánh giá về Sản phẩm</h3>
                                  <div class="card_inf">
                                    <div class="ratingg">
                                        <span class="rating-score">{{$avgmucdo}} trên 5</span>
                                       
                                        <div class="starss">
                                        @php
                                          $ratingg = $avgmucdo ?? 0; 
                                          $fullStars = floor($ratingg); 
                                          $halfStar = ($ratingg - $fullStars) >= 0.5; 
                                      @endphp

                                      @for ($i = 1; $i <= 5; $i++)
                                          @if ($i <= $fullStars)
                                              <span class="starss" style="color: #FFD700;">★</span> 
                                          @elseif ($i == $fullStars + 1 && $halfStar)
                                              <span class="starss" style="color: #FFD700;">&#9733;</span> 
                                          @else
                                              <span class="starss" style="color: #ccc;">★</span> 
                                          @endif
                                      @endfor

                                            
                                        </div>
                                        <div class="rating-options">
                                            <button>Tất Cả</button>
                                            <button>5 Sao ({{$namsao}})</button>
                                            <button>4 Sao ({{$bonsao}})</button>
                                            <button>3 Sao ({{$basao}})</button>
                                            <button>2 Sao ({{$haisao}})</button>
                                            <button>1 Sao ({{$motsao}})</button>
                                        </div>
                                        <div class="additional-options">
                                            <button>Có Bình Luận ({{$getbl}})</button>
                                            <button>Có Hình Ảnh ({{$countanh}})</button>
                                        </div>
                                    </div>
                                    
                                    @if(isset($showdg) && count($showdg) >0)
                                      @forelse($showdg as $show )
                                      <div class="review">
                                          <div class="user-info">
                                              <img src="{{asset($show->avt)}}" alt="Avatar">
                                              <span class="username">{{$show->HOTEN}}</span>
                                              <!-- <span class="user-rating" id="user-rating">★★★★★</span> -->
                                              @php
                                                  $rating = $show->MUCDO ?? 0; 
                                              @endphp
                                              @for ($i = 1; $i <= 5; $i++)
                                                  <span style="color: {{ $i <= $rating ? '#FFD700' : '#ccc' }};">★</span>
                                              @endfor
                                              <span class="review-date">{{$show->TIME}}</span>
                                          </div>
                                          <div class="review-details">
                                              <!-- <p><strong>Công dụng:</strong> tẩy trang</p> -->
                                              <p><strong>Bình luận:</strong> {{$show->BINHLUAN}}</p>
                                          </div>
                                          <!-- <p class="review-text">{{$show->BINHLUAN}}</p> -->
                                          <div class="review-images">
                                            <img src="{{asset($show->ANHDG)}}" alt="Image 1">   
                                          </div>
                                      </div>
                                      @empty
                                          <p class="notdg">Không có đánh giá</p>
                                      @endforelse
                                      @else
                                      <p class="notdg">Không có đánh giá</p>
                                      @endif
                                </div>

                                  </div>  
                              </div>
                          </div>
                          <div class="card-map" >
                            <a class="seemap" href="{{URL::to('/map')}}">Tìm kiếm phương tiện gần bạn</a>
                              <div class="container-fluid"id="map" style="width:100%; height: 500px; margin-top: 10px;" >
                                  <h3>Địa chỉ trên bản đồ</h3>
                                  
                                  <div class="info">
                                      <div class="col">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </main> 
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
	
  <script>
    // Khởi tạo bản đồ với vị trí mặc định
    var map = L.map('map').setView([10.128012222663713, 105.52961441188978], 11);

    // Tải lớp bản đồ từ OpenStreetMap
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Leaflet &copy; OpenStreetMap contributors',
        maxZoom: 18
    }).addTo(map);

    // Địa chỉ (tên phường xã và quận huyện) được lấy từ controller và truyền vào view
    var address = @json($fullAddress);

    // Tìm kiếm tọa độ từ địa chỉ và tạo marker
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                var lat = data[0].lat;
                var lon = data[0].lon;

                // Đặt marker từ địa chỉ trong controller
                var mainMarker = L.marker([lat, lon], {
                    icon: L.icon({
                        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                        iconSize: [25, 41], // Kích thước biểu tượng
                        iconAnchor: [12, 41], // Điểm neo
                        popupAnchor: [1, -34]
                    })
                }).addTo(map)
                    .bindPopup(`<b>${address}</b><br>Vĩ độ: ${lat}<br>Kinh độ: ${lon}`)
                    .openPopup();

                // Đặt bản đồ đến vị trí của địa chỉ
                map.setView([lat, lon], 13);

                // Tọa độ điểm đích
                var destination = L.latLng(lat, lon);

                // Lắng nghe sự kiện click trên bản đồ
                var temporaryMarker = null; // Lưu trữ marker tạm thời

                map.on('click', function (e) {
                    var start = e.latlng; // Lấy tọa độ người dùng chọn

                    // Gỡ marker cũ nếu đã có
                    if (temporaryMarker) {
                        map.removeLayer(temporaryMarker);
                    }

                    // Tạo marker với màu khác
                    temporaryMarker = L.marker([start.lat, start.lng], {
                        icon: L.icon({
                            iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-red.png', // Marker đỏ
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34]
                        })
                    }).addTo(map)
                        .bindPopup(`Điểm xuất phát<br>Vĩ độ: ${start.lat}<br>Kinh độ: ${start.lng}`)
                        .openPopup();

                    // Vẽ đường từ vị trí click đến điểm đích
                    L.Routing.control({
                        waypoints: [
                            start,       // Điểm bắt đầu
                            destination  // Điểm đích
                        ],
                        routeWhileDragging: true // Kéo để thay đổi đường đi
                    }).addTo(map);
                });
            } else {
                alert("Không tìm thấy địa chỉ. Vui lòng thử lại!");
            }
        })
        .catch(error => console.error("Lỗi khi gọi API Nominatim: ", error));
</script>

    <!-- footer -->
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
                  <a href="#" class="footer-item__link">Chính Sách Vận Chuyển</a>
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
                    Facebook</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">
                    Instagram</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="footer-item__link">
                    Linkedin</a>
                </li>
              </ul>
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
    </div>
  </div>
    <!-- ------------------------------------------------------ -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../assets/js/app.js"></script>
    <script>
   
    const pricePerDay = {{ $detail_new->PRICE }};

    const blockedDates = @json($blockedDates);  

    function isRangeValid(startDate, endDate) {
        const date = new Date(startDate);
        const end = new Date(endDate);

        while (date <= end) {
            const dateString = date.toISOString().split('T')[0]; 
            if (blockedDates.includes(dateString)) {
                return false; 
            }
            date.setDate(date.getDate() + 1); 
        }

        return true; 
    }


// Cập nhật hàm tính tổng giá
function calculateTotalPrice() {
    const ngayThue = document.getElementById("ngay_thue").value;
    const ngayTra = document.getElementById("ngay_tra").value;

    if (ngayThue && ngayTra) {
        if (!isRangeValid(ngayThue, ngayTra)) {
            alert("Khoảng thời gian chọn có ngày đã bị chặn. Vui lòng chọn lại.");
            document.getElementById("totalPrice").innerText = "0 vnđ";
            document.getElementById("totalPriceValue").value = 0;
            document.getElementById("paymentTotalPriceValue").value = 0;
            return;
        }

        const dateThue = new Date(ngayThue);
        const dateTra = new Date(ngayTra);

       
        const timeDiff = dateTra - dateThue;
        let days = timeDiff / (1000 * 60 * 60 * 24); 

        if (days === 0) {
            days = 1;
        }

        if (days >= 0) {
            const totalPrice = days * pricePerDay;
            document.getElementById("totalPrice").innerText = new Intl.NumberFormat().format(totalPrice) + " vnđ";
            document.getElementById("totalPriceValue").value = totalPrice;
             // Cập nhật giá trị trong form thanh toán
             document.getElementById("paymentTotalPriceValue").value = totalPrice;
        } else {
            document.getElementById("totalPrice").innerText = "0 vnđ";
            document.getElementById("totalPriceValue").value = 0;
            document.getElementById("paymentTotalPriceValue").value = 0;
        }
    }
}


document.getElementById("orderForm").addEventListener("submit", (event) => {
    const ngayThue = document.getElementById("ngay_thue").value;
    const ngayTra = document.getElementById("ngay_tra").value;

    if (!isRangeValid(ngayThue, ngayTra)) {
        alert("Khoảng thời gian chọn có ngày đã được thuê. Vui lòng chọn lại.");
        event.preventDefault(); // Ngăn việc gửi form
    }
});

// Hàm kiểm tra và vô hiệu hóa các ngày đã thuê trên lịch
function disableBookedDates() {
    const ngayThueInput = document.getElementById('ngay_thue');
    const ngayTraInput = document.getElementById('ngay_tra');

    // Hàm vô hiệu hóa ngày đã thuê
    function disableDates(input) {
        flatpickr(input, {
            disable: blockedDates,  // Disable những ngày trong blockedDates
            dateFormat: "Y-m-d",  
            minDate: new Date().toISOString().split('T')[0],
            // minDate: "{{ $detail_new->TGTHUE }}",  // Giới hạn ngày bắt đầu
            maxDate: "{{ $detail_new->TGTRA }}",  
        });
    }

    disableDates(ngayThueInput);
    disableDates(ngayTraInput);
}

// Hàm cập nhật giá trị vào trường ẩn khi biểu mẫu gửi đi
function updateTotalPriceValue() {
    const totalPriceText = document.getElementById("totalPrice").innerText;
    const totalPrice = parseInt(totalPriceText.replace(/\D/g, '')); // Loại bỏ chữ và chỉ lấy số

    console.log("Tổng tiền gửi đi: ", totalPrice);  // Kiểm tra giá trị tổng tiền khi gửi

    // Kiểm tra giá trị trước khi gửi
    if (totalPrice < 5000 || totalPrice > 1000000000) {
        alert("Số tiền không hợp lệ. Phải nằm trong khoảng từ 5.000 đến 1.000.000.000 VNĐ.");
        document.getElementById("totalPrice").innerText = "0 vnđ";
        document.getElementById("totalPriceValue").value = 0;
       
        return;
    }

    document.getElementById("totalPriceValue").value = totalPrice;
}

// Gọi hàm vô hiệu hóa ngày đã thuê khi trang tải
document.addEventListener('DOMContentLoaded', () => {
    disableBookedDates(); // Vô hiệu hóa các ngày đã thuê ngay khi trang tải
    // Cập nhật giá trị khi thay đổi ngày
    document.getElementById("ngay_thue").addEventListener('change', calculateTotalPrice);
    document.getElementById("ngay_tra").addEventListener('change', calculateTotalPrice);
});
</script>


<!---------script ẩn ngày đã thuê------->


<script>
    function updateHiddenFields() {
       
        const loinhan = document.getElementById('soluong').value;
        const ngayThue = document.getElementById('ngay_thue').value;
        const ngayTra = document.getElementById('ngay_tra').value;
        const pttt = document.getElementById('status').value;
        const totalPrice = document.getElementById('totalPriceValue').value;
        
        document.getElementById('hiddenLoiNhan').value = loinhan;
        document.getElementById('hiddenNgayThue').value = ngayThue;
        document.getElementById('hiddenNgayTra').value = ngayTra;
        document.getElementById('hiddenPptt').value = pttt;
        document.getElementById('paymentTotalPriceValue').value = totalPrice;
    }

    // Gọi hàm updateHiddenFields trước khi submit form thanh toán
    document.getElementById('paymentForm').addEventListener('submit', function (event) {
        updateHiddenFields();
    });
</script>
