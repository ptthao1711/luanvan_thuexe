
<link href="{{asset('css/login.css')}}" rel="stylesheet" />
<script src="{{asset('js/boot.js')}}" type="text/javascript"></script>
<div class="container" id="container">
  <title>Login</title>
	<div class="form-container sign-up-container">
		<form action="signup.blade.php">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f" style = "background-image: url('images/ic/bell.png');"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
			</div>
			<span>or use your email for registration<</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email/Số điện thoai/Tên Đăng Nhập" />
			<input type="password" placeholder="Mật Khẩu" />
			<button>Đăng Ký</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="{{URL::to('/user_home')}}" method="post">
			<h1>Đăng Nhập</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
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
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Đăng Ký</button>
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>