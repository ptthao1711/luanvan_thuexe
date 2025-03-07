
<link href="{{asset('css/login.css')}}" rel="stylesheet" />
<script src="{{asset('js/boot.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<body>
<div class="container" id="container">
  <title>CTRent-Đăng Ký</title>
	<div class="form-container sign-in-container">
		<form action="{{URL::to('')}}" method="post">
			<h1>Tạo tài khoản</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f" style="font-size:20px; color: #0000d0;"></i></a>
				<a href="{{ route('login.google') }}"  class="social"><i class="fab fa-google" style="font-size:20px;color: #bc0000;"></i></a>
			</div>
			<span>hoặc sử dụng email</span>
			{{ csrf_field( )}}
			<input type="text" placeholder="Name" name="user_hoten" />
			<input type="email" placeholder="Email/Số điện thoai/Tên Đăng Nhập" name="user_email" />
			<input type="password" placeholder="Mật Khẩu"  name="user_password"/>
			@if(session('success'))  
   			 <div class="alert alert-success">{{ session('success') }}</div>  
			@endif  

			@if(session('error'))  
   			 <div class="alert alert-danger">{{ session('error') }}</div>  
			@endif
			<button>Đăng Ký</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Welcome Back!</h1>
				<p>Để giữ liên lạc với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
				<button class="ghost" id="signIn" onclick="window.location.href='/'">Đăng Nhập</button>
			</div>
			
		</div>
	</div>
</div>
</body>
<footer>
	
</footer>