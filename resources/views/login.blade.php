
<link href="{{asset('css/login.css')}}" rel="stylesheet" />
<script src="{{asset('js/boot.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="container" id="container">
<title>Login</title>
<link rel="icon" href="images/logo2.png">
	
	<div class="form-container sign-in-container">
		<form action="{{URL::to('/user_home')}}" method="post">
			<h1>Đăng Nhập</h1>
			<div class="social-container">
			
			<a href="#" class="social"><i class="fab fa-facebook-f" style="font-size:20px; color: #0000d0;"></i></a>
			<a href="{{ route('login.google') }}"  class="social"><i class="fab fa-google"style="font-size:20px; color: #bc0000;" ></i></a>
			</div>
			<span>Hoặc,đăng nhập bằng</span>
			{{ csrf_field( )}}
			<input type="email" name="user_email"placeholder="Email/Số điện thoai/Tên Đăng Nhập"  />
			<input type="password" name="user_password" placeholder="Mật Khẩu" />
			<?php
			$message = Session::get('message');
			if($message){
				echo '<span class="text-alert">'.$message.'</span>';
				Session::put('message',null);
			}
			?>
			<a href="#">Quên mật khẩu?</a>
			<button name="submit" >Đăng Nhập</button>	
		</form>
		
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Chào bạn!</h1>
				<p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình mới cùng chúng tôi</p>
				<button class="ghost" id="signUp" onclick="window.location.href='/dangky'">Đăng Ký</button>
			</div>
		</div>
	</div>
</div>

