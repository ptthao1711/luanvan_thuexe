<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent-Tin nhắn</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/chat.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="../css/all.min.css"/>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    
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
                    <a class="select-input__link" >
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
                    <li class="header__cart-item" >
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
                          <span class="header__cart-item-description">{{timeAgo($like->timepost)}}</span >
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
    @if(isset($conversations) && count($conversations))
  <div class="row clearfix">
      <div class="col-lg-12">
          <div class="card chat-app">
              <div id="plist" class="people-list">
                  <div class="input-group">

                      <input type="text" class="form-control-search" placeholder="Search...">
                  </div>
                  <ul class="list-unstyled chat-list mt-2 mb-0" style="margin-left: -40px;">
                
                  @foreach($conversations as $con)
                    <li class="clearfix active">
                      <a  href="{{ route('chat',['ID_HT'=>$con['ID_HT']]) }}" value="{{$con['ID_HT']}}">
                      <img src="{{asset($con['other_user']['avt'])}}" alt="avatar">
                        <div class="about">
                            <div class="name">{{$con['other_user']['HOTEN']}}</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> Truy cập {{timeAgo($con['other_user']['trangthaihoatdong'])}}</div>                                             
                          </div>
                         <!--//-->
                         <div class="select-input"  style="background-color: #80808000;">
                              <i class=" material-icons" id="toggleDropdown">keyboard_arrow_down</i>
                              <!-- List option -->
                              <ul class="select-input_list">
                                <li class="select-input_item">
                                <form action="{{ route('chat.delete', ['ID_HT' => $con['ID_HT']]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                  <button type="submit" class="select-input__link">Xóa</button>
                                </form>
                                  <a href="" class="select-input__link">Ghim trò chuyện</a>
                                </li>
                              </ul>
                            </div>
                         <!------------------>
                      </a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>  
            <div class="chat">
              <div class="mess">
                <div class="chat-header clearfix">
                    <div class="row">
                      @foreach ($showavt as $show)
                      
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="{{asset($show->avt)}}" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">{{$show->HOTEN}}</h6>
                                <small class="small">Truy cập: {{timeAgo($show->trangthaihoatdong)}}</small>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>
                <div class="main">
                <div class="chat-history">
                    <ul class="m-b-0">
                    @if(isset($showmess) && count($showmess))
                    @foreach($showmess as $mess)
                    @if($mess->IDTK == $idTK)
                        <li class="clearfix">
                            <div class="message other-message float-right">{{$mess->content}}</div>
                            <!-- <div class="message-data text-right">
                                <span class="message-data-time send">{{ date('H:i:s d-m-Y', strtotime($mess->timestamp)) }}</span>
                            </div> -->
                        </li>
                      @else
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time">{{ date('H:i:s d-m-Y', strtotime($mess->timestamp)) }}</span>
                            </div>
                            <div class="message my-message">{{$mess->content}}</div>                                    
                        </li> 
                        @endif
                        @endforeach
                      @else
                        <p class="pp">Chưa có tin nhắn.</p>
                      @endif                              
                        
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                      <form action="{{ route('send', ['ID_HT' => $ID_HT]) }}" method="POST">
                        @csrf
                        <input type="text" name="send" class="form-control" autocomplete="off" placeholder="   Nhập tin nhắn...">    

                      </form>                                
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@else
<p>Không có hội thoại</p>
@endif
</div>

