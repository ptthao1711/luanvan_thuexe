<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTRent-Tài Chính</title>
    <link rel="icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/taichinh.css"/>
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
                @csrf
                <input 
                  
                  name="keywordsubmit"
                  type="text"
                  class="header__search-input"
                  placeholder="Nhập để tìm kiếm xe"
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
                    
                   
                  </ul>
                  <a href="#" class="header__cart-view-cart btn btn--primary"
                    >Xem tin đã lưu</a
                  >
                </div>
              </div>
              <button  href="{{URL::to('/news')}}" class="buttuon_head" onclick="window.location.href='/news'"> ĐĂNG TIN</button>

              <!-- <a class="header__cart-wrap"> Đăng Tin</a> -->
            </div>
          </div>
        </div>
        
      </header>
      <div class="container">  
        <i class="material-icons note">help_outline</i>
        <div class="doanhthu">
          <span>Doanh thu sẽ được cập nhật định kỳ 6 tháng một lần, số dư sẽ được cộng dồn vào định kỳ tiếp theo.</span>
        </div>
        
        <div class="card purple">  
            <div class="info">  
                <span class="label">Doanh thu</span> 
                <span class="number">{{number_format($revenue)}}đ</span>   
            </div>  
        </div>  
        <div class="card yellow">  
            <div class="info">  
                <span class="label">Đơn hoàn thành</span>  
                <span class="number">{{$counthoanthanh}}/{{$countorrder}} đơn</span>  
            </div>  
        </div>
        <div class="card blue">  
            <div class="info">  
                <span class="label">Doanh thu online</span>  
                <span class="number">{{number_format($revenue_online)}}đ</span>  
            </div>  
        </div>  
        <div class="card green">  
            <div class="info">  
                <span class="label">Doanh thu trực tiếp</span>  
                <span class="number">{{number_format($revenue_live)}}đ</span>  
            </div>  
        </div> 
        @foreach($giaodich as $gd) 
       
        <form action="{{ route('payment') }}" method="POST">
          @csrf
        <div class="card red">  
            <div class="info">  
                <span class="label">Phí nợ sàn</span>  
                <span class="number">{{number_format($gd->NOSAN)}}đ</span> 
                <input type="hidden" id="totalPriceValue" name="total_price" value="{{$gd->NOSAN}}">
                <button id="withdrawButton" class="pay" @if($gd->NOSAN == 0) disabled @endif>Thanh Toán</button> 
            </div>  
        </div>

        </form>
        <div class="card purple">  
            <div class="info">  
                <span class="label">Số dư</span>  
                <span class="number" id="soduDisplay">{{number_format($gd->SODU)}}đ</span>  
                <button @if($gd->SODU == 0) disabled @endif onclick="openModal()" class="pay">Rút Tiền</button> 
            </div>  
        </div>  
    </div>  
    @endforeach
    
    @if(session('success'))  
      <div class="thongbao" id="success-alert">{{ session('success') }}</div>  
    @endif  
    @if(session('error'))  
      <div class="loi" id="success-alert">{{ session('error') }}</div>  
    @endif  

    @if ($errors->has('price'))
      <p style="color: red;font-size: 13px;" id="price-alert">{{ $errors->first('price') }}</p>
    @endif


    <section class="section">  
        <div class="contain">   
            <div class="cardd">  
                <div class="card-header">Lịch sử giao dịch</div>  
                <div class="card-body">  
                    <table class="table">  
                        <thead>  
                            <tr>  
                                <th>Mã giao dịch</th>  
                                <th>Tên tài khoản</th>  
                               
                                <th>Số tiền</th>  
                                <th>Thời gian</th>  
                                <th>Trạng Thái</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                          @foreach($lichsugiaodich as $ls)
                            <tr>  
                                <td>CTRENT{{$ls->ID_LSTT}}</td>  
                                <td>{{$ls->HOTEN}}</td>  
                                <td>{{number_format($ls->TIEN)}} VNĐ</td>  
                                <td>{{$ls->time}}</td>  
                        
                                <td>{{$ls->trangthai}}      
                                </td>  
                            </tr>  
                            @endforeach
                           
                        </tbody>  
                    </table>  
                </div>  
            </div>  
        </div>  
    </section>  

<style>
  body {  
    font-family: 'Arial', sans-serif;  
    background-color: #f7f9fc;  
    margin: 0;  
    padding: 20px;  
}  

.section {  
    max-width: 800px;  
    margin: 0 auto;  
}  

.head {  
    text-align: center;  
    font-size: 2em;  
    color: #2c3e50;  
    margin-bottom: 10px;  
}  

.subheader {  
    text-align: center;  
    color: #7f8c8d;  
    margin-bottom: 20px;  
}  

.cardd {  
    background: white;  
    border-radius: 8px;  
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
}  

.card-header { 
    margin-top: 50px;
    background-color: #7bc3d58f; 
    padding: 15px;  
    font-size: 1.5em;  
    text-align: center;  
    font-weight: bold;  
    border-top-left-radius: 8px;  
    border-top-right-radius: 8px;  
}  

.card-body {  
    padding: 20px;  
}  

.table {  
    width: 100%;  
    border-collapse: collapse;  
}  

.table th, .table td {  
    width: 100px;
    padding: 15px;  
    text-align: left;  
    border-bottom: 1px solid #ddd;  
}  

.table tr:nth-child(odd) {  
    background-color: #f9f9f9;  
}  

.btn {  
    padding: 8px 12px;  
    border: none;  
    border-radius: 5px;  
    color: white;  
    font-weight: bold;  
    cursor: pointer;  
}  

.btn-success {  
    background-color: #28a745; 
}  

.btn-danger {  
    background-color: #dc3545; 
}
</style>
  <!-- Modal  -->
 
  <div class="modal-overlay" id="modal">
    <div class="modal">
    <form action="{{ route('add.bank') }}" method="POST" id="bankForm">
    @csrf
      <button style="width: 40px;" class="close-btn" onclick="closeModal()">X</button>
      <h2>Thông Tin Ngân Hàng</h2>
        <select name="bank" required>
          <option value="" disabled selected>Chọn Ngân Hàng</option>
          <option value="vietcombank">Vietcombank</option>
          <option value="techcombank">Techcombank</option>
          <option value="acb">ACB</option>
          <option value="bidv">BIDV</option>
          <option value="bidv">MBANK</option>
        </select>
        <input type="text" name="stk" placeholder="Nhập số tài khoản" required>
        <input type="text" name="name" placeholder="Nhập họ và tên" required>
        <input type="text" name="price" id="withdrawAmount" placeholder="Số tiền rút" required>
        <p id="error" style="color: red; display: none;">Số tiền nhập vào lớn hơn số dư hiện tại.</p>
        <button type="submit" onclick="submitRequest()">Yêu Cầu</button>
      </form>
    </div>
  </div>



  <script>
// Mở Modal
function openModal() {
    document.getElementById('modal').style.display = 'flex';
}


function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

document.getElementById('bankForm').addEventListener('submit', function(event) {
    // Ngăn chặn hành vi submit mặc định
    event.preventDefault();

    // Lấy số dư hiện tại từ phần hiển thị
    const currentBalanceElement = document.getElementById('soduDisplay');
    const currentBalance = parseFloat(currentBalanceElement.innerText.replace('đ', '').replace(/,/g, ''));

    // Lấy số tiền muốn rút từ input
    const withdrawAmount = parseFloat(document.getElementById('withdrawAmount').value);

    // Kiểm tra số tiền rút có lớn hơn số dư không
    if (isNaN(withdrawAmount) || withdrawAmount <= 0) {
        // Hiển thị lỗi nếu số tiền rút không hợp lệ
        document.getElementById('error').innerText = "Vui lòng nhập số tiền hợp lệ.";
        document.getElementById('error').style.display = 'block';
    } else if (withdrawAmount > currentBalance) {
        // Hiển thị lỗi nếu số tiền lớn hơn số dư
        document.getElementById('error').innerText = "Số tiền nhập vào lớn hơn số dư hiện tại.";
        document.getElementById('error').style.display = 'block';
    } else {
        // Nếu hợp lệ, tiến hành trừ số dư và gửi form
        document.getElementById('error').style.display = 'none';

        // Cập nhật lại số dư hiển thị
        const newBalance = currentBalance - withdrawAmount;
        currentBalanceElement.innerText = newBalance.toLocaleString() + 'đ';

        // Đóng modal
        closeModal();

        // Gửi form
        this.submit();
    }
});
</script>

