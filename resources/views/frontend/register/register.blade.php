<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.spancek{
			margin-top: 435px;
		};
	</style>
	<script type="text/javascript">
		function cek(){
            var vcek = document.getElementById('icek');
            var sub = document.getElementById('reg');
            
            if (vcek.checked == true) {
                document.getElementById('reg').disabled = false;
                
            }
        }
	</script>

</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
            <form action="actionRegisterCustomer" method="POST">
			@csrf
			@if(session()->has('registerSuccess'))
			<div class="alert alert-success" role="alert">
				{{ session('registerSuccess') }}
			</div>
			@endif
			@if(session()->has('registerFailed'))
			<div class="alert alert-warning" role="alert">
				{{ session('registerFailed') }}
			</div>
			@endif
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="hidden" name="id">
			<input type="text" name="nama" placeholder="Nama Lengkap">
			<input type="email" name="email" placeholder="Email">
			
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">    
			<button type="submit" name="regis" id="reg" onclick="cek();">Sign Up</button>
			<!-- <input type="submit" name="regis" value="Sign Up" id="reg" onclick="cek();" disabled> -->
		</form>
	</div>
	<div class="form-container sign-in-container">
            <form action="auth" method="POST">
			@csrf
			@if(session()->has('registerSuccess'))
			<div class="alert alert-warning" role="alert">
				{{ session('registerSuccess') }}
			</div>
			@endif
			@if(session()->has('registerFailed'))
			<div class="alert alert-warning" role="alert">
				{{ session('registerFailed') }}
			</div>
			@endif
			<h1>Sign In</h1>
			<span>or use your account</span>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<a href="#">Forgot Your Password</a>
			<button>Sign In</button>
			</form>

	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat Datang!</h1>
				<p>Silahkan daftar bersama kami dan kenali kami dengan Produk dari TokoPakDio </p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Haii, Gaiss!</h1>
				<p>Silahkan masuk dan nikmati produk dari TokoPakDio</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	
</script>


</body>
</html>








