<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent_Đơn thuê</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/order.css" />
    <link rel="stylesheet" href="../css/danhgia.css" />
    <script src="../jss/script.js"></script>
    <script src="../jss/danhgia.js"></script>

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
                            <span class="header__cart-item-price"
                              >{{$like->PRICE}}</span
                            >
                            
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

                <button onclick="window.location.href='/order_buy';" method="post" class="home-filter__btn btn" style="cursor: pointer; background-color: #0900af; color: white;">Tất cả</button>
                @foreach ($status as $tt)
                <a href="{{ route('order.id', ['id_status' => $tt->ID_TT]) }}" 
                    class="home-filter__btn btn {{ request()->route('id_status') == $tt->ID_TT ? 'btn-green' : '' }}">
                    {{$tt->TEN_TT}}
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

              @if(session('thanhcong'))  
                <div class="alert alert-success" id="success-alert" style="font-size: 15px;color: green;margin-left: 300px;">{{ session('thanhcong') }}</div>  
                  @endif  
                  @if(session('huy'))  
                  <div class="alert alert-danger" id="error-alert" style="font-size: 15px;color: green;margin-left: 300px;">{{ session('huy') }}</div>  
                 @endif

              @if(isset($orderbyidtk) && count($orderbyidtk) > 0)
                @foreach($orderbyidtk as $key => $order)
                    <div class="contain">  
                        <div class="orders">  
                            <img src="{{asset($order->avt)}}" alt="" class="header__navbar-user-img" />
                            <span class="shop-name">{{$order->HOTEN}}</span>
                            <form  action="{{ route('chatwith') }}" method="POST">
                              @csrf
                              <input type="hidden" name="IDTK" value="{{$order->IDTK}}"> <!-- IDTK của người cần trò chuyện -->
                              <button class="chat-button">Chat</button>  
                            </form>

                            <button class="view-shop-button" onclick="window.location.href='/account/{{$order->IDTK }}';">Xem Shop</button>  
                        </div>  
                        <div class="product-info">  
                            <img src="{{ asset($order->DUONGDAN) }}" onclick="window.location.href='/detail_order_buy/{{ $order->ID_ORDER }}';" alt="Sản phẩm" class="product-image">
                            <div class="product-details">  
                                <h2 class="product-title">{{ $order->TIEUDE }}</h2>  
                                <p class="category">Phân loại : {{ $order->TEN_LOAI }}</p>
                                <p class="quantity">Tình trạng: {{ $order->TenTTX }}</p>
                                <p class="quantity">Đã gữi: {{timeAgo($order->timepost) }}</p> 
                                <div class="price-info">  
                                    <span class="original-price">{{ $order->original_price ?? '' }}</span>  
                                    <span class="discounted-price">{{ number_format($order->PRICE )}}/VNĐ</span>
                                </div>  
                            </div>  
                        </div>  
                        <div class="foot">  
                            <p class="total">Thành tiền: <span class="total-amount" style="color: red;">{{ number_format($order->TOTAL) }}đ</span></p>  
                            <form action="{{ route('confirm.buy') }}" method="POST">
                                @csrf
                                @if(session('success'))  
                                    <div class="alert alert-success" id="success-alert" style="font-size: 15px;color: green;margin-left: 300px;">{{ session('success') }}</div>  
                                @endif  
                                @if(session('error'))  
                                    <div class="alert alert-danger" id="error-alert" style="font-size: 15px;color: green;margin-left: 300px;">{{ session('error') }}</div>  
                                @endif

          
                                <input type="hidden" name="ID_ORDER" value="{{$order->ID_ORDER}}">
                                @if($order->ID_TT == 1)
                                    <button class="confirm-button" style="background-color: #bdbcc4; color: black;" disabled>Chờ xác nhận</button>
                                    
                                @elseif($order->ID_TT == 2)
                                    <a class="hopdong"  href="{{ route('hopdong', ['ID_ORDER' => $order->ID_ORDER]) }}">Xem hợp đồng</a>
                                    <input type="hidden" name="ID_TIN" value="{{$order->ID_TIN}}">
                                    <input type="hidden" name="ID_PTTT" value="{{$order->ID_PTTT}}">
                                    <input type="hidden" name="total" value="{{$order->TOTAL}}">
                                    <input type="hidden" id="tg_tra" name="tgtra" value="{{$order->TGTRA}}">

                                    <button class="confirm-button"  id="confirm_xn" disabled>Xác nhận hoàn thành</button>
                                    
                                @elseif($order->ID_TT == 3)
                                    <button class="confirm-button" id="show-rating-form" data-id-tin="{{$order->ID_TIN}}" 
                                    data-id-order="{{$order->ID_ORDER}}"  type="button">Đánh giá</button>
                                    @if(session('succes'))
                                        <div class="alert alert-success" id="success-alert" style="font-size: 15px; color: green;">{{ session('succes') }}</div>
                                    @endif

                                    @if(session('erro'))
                                        <div class="alert alert-danger" id="orror-alert" style="font-size: 15px; color: red;">{{ session('erro') }}</div>
                                    @endif
                                
                                @elseif($order->ID_TT == 4 )
                                    <button class="confirm-button" disabled>Sửa đánh giá</button>
                                @endif  
                            </form>
                              @if($order->ID_TT == 1)
                             
                                  <button class="btn btn-danger confirm-button" id="cancelButton" >Hủy</button>
      
                               @endif
                               @if($order->ID_TT == 5)
                              
                                  <button onclick="window.location.href='/detail/{{ $order->ID_TIN }}';" class="confirm-button">Đặt lại</button>
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
<!-- -------------------------------------------------- đánh giá--------------- -->
                                    @if(isset($order))
                                    <form action="{{ route('danhgia') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($orderbyidtk) && count($orderbyidtk) > 0 )  
                                    <div id="rating-form" class="overlay" style="display: none; position: fixed;">
                                    <div class="popup">
                                        <h2>Đánh Giá Tin Thuê</h2>
                                        <a class="close" href="#">&times;</a>
                                        <div class="content">
                                            <div class="product-info">
                                                <img src="{{asset($order->DUONGDAN)}}" alt="Product Image">
                                                <div>
                                                    <div class="product-name">{{$order->TIEUDE}}</div>
                                                    <div class="product-category">{{$order->TOTAL}}</div>
                                                </div>
                                            </div>

                                            <div class="rating">
                                                <div class="stars" id="rating-stars">
                                                    <span data-value="1">&#9733;</span>
                                                    <span data-value="2">&#9733;</span>
                                                    <span data-value="3">&#9733;</span>
                                                    <span data-value="4">&#9733;</span>
                                                    <span data-value="5">&#9733;</span>
                                                </div>
                                                <div id="rating-value"></div>
                                                <div class="rating-text" id="rating-text"></div>
                                            </div>
                                            <input type="hidden" name="MUCDO" id="mucdo" value=""> 
                                            <input type="hidden" name="ID_TIN" value="">
                                            <textarea name="comment" class="binhluan" placeholder="Bình luận:"></textarea>
                                            
                                            <textarea  name="binhluan" class="binhluan" placeholder="Dịch vụ người cho thuê:"></textarea>
                                            <label class="goiy">Gợi ý:</label>
                                            @foreach ($showdg as $show )
                                            <button type="button" class="tieuchi" value="{{$show->ID_TCT}}">{{$show->TENTIEUCHI}}</button>
                                            @endforeach

                                            <div class="upload-box">  
                                                <input type="file" id="image-upload" name="image" accept="image/*"  multiple>  
                                                <label for="image-upload">Thêm hình ảnh</label>  
                                                <img id="image-preview" alt="Image Preview" >    
                                                <button id="remove-image" style="display: none;">X</button>
                                            </div>  
                                            
                                            <div class="buttons">
                                                <button class="btn-back">TRỞ LẠI</button>
                                                <input type="hidden" name="ID_ORDER" value="">
                                                <button class="btn-submit">Hoàn Thành</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                
                                <!-- Modal -->
                               <form action="{{ route('confirm.huy') }}" method="POST" style="display:inline;">
                                  @csrf
                                  <input type="hidden" name="ID_ORDER" value="{{$order->ID_ORDER}}">
                                  <div class="overlay1" id="cancelModal" tabindex="-1" style="display: none;" >
                                    <div class="modal-dialog1">
                                      <div class="modal-content">
                                        
                                        <div class="modal-body">
                                          <form id="cancelForm">
                                            <div class="mb-3">
                                              <h2>Lý do hủy</h2>
                                              <input type="text" name="noidung" class="form-control" id="reasonInput" placeholder="Nhập lý do hủy" >
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
                                @else
                                    <!-- Nếu không có dữ liệu -->
                                    <div id="rating-form" class="overlay" style="display: none;">
                                        <div class="popup">
                                            <h2>Không có dữ liệu để đánh giá</h2>
                                            <a class="close" href="#">&times;</a>
                                        </div>
                                    </div>
                                @endif
                                </form>
                                @endif
<!-- xử lý nút xác nhận hoàn thành -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const totalInput = document.getElementById('tg_tra'); 
    const confirmButton = document.getElementById('confirm_xn'); 

    const tgtraDate = new Date(totalInput.value);

    const currentDate = new Date();

    const checkDate = new Date(tgtraDate);
    checkDate.setDate(checkDate.getDate() - 1);

    if (currentDate >= checkDate) {
        confirmButton.disabled = false; 
    }
});

</script>

<style>
  button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        const tieuchiButtons = document.querySelectorAll(".tieuchi");
       
        const dichVuTextarea = document.querySelector("textarea.binhluan[placeholder='Dịch vụ người cho thuê:']");
        tieuchiButtons.forEach(button => {
            button.addEventListener("click", function() {
                const tieuchiText = button.textContent;

               
                if (dichVuTextarea.value) {
                    dichVuTextarea.value += "\n" + tieuchiText;
                } else {
                    dichVuTextarea.value = tieuchiText;
                }

              
                button.style.display = "none";
            });
        });
    });
</script>
<!-------------------------------------------------------------------------------------------------------------------------------------->
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

                  // Đường dẫn thư mục lưu trữ (thay đổi đường dẫn nếu cần)  
                  $uploadDirectory = 'images/danhgia/';  
                  if (!is_dir($uploadDirectory)) {  
                      mkdir($uploadDirectory, 0755, true);  
                  }  

                  // Di chuyển file đến thư mục chỉ định  
                  move_uploaded_file($fileTmpName, $uploadDirectory . $fileName);  
                  echo "<p>Đã tải lên: $fileName</p>";  
              }  
          }  
      }  
      ?>  

          
