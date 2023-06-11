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
	<div class="form-container sign-in-container">
            <form action="login_action.php" method="POST">
			<h1>Sign In cuy</h1>
			<span>or use your account</span>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<a href="#">Forgot Your Password</a>
			<button>Sign In</button>
		</form>
	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Haii, Gaiss!</h1>
				<p>Silahkan masuk dan nikmati produk dari TokoPakDio</p>
				<button class="ghost" id="signUp"><a href="registerCustomer">Sign Up</a></button>
			</div>
		</div>
	</div>
</div>
</body>
</html>








 