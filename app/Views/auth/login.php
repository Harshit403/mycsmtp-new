<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/cdn/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/cdn/adminlte.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		.btn-login {
		    margin: 0px;
		    background: #00accc;
		    padding: 4px 15px !important;
		    font-size: 11px !important;
		    font-weight: 500;
		    width: 100%;
		}
	</style>
    <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<img src="<?=base_url()?>/images/logo.jpg" height="80" width="80">
		</div>
		<label class="d-flex justify-content-center"> If you are the examinar then please select examinar</label>
		<div class="form-group d-flex justify-content-center">
			<div class="form-check mr-2">
				<input class="form-check-input" type="radio" name="user_type" checked value="admin">
				<label class="form-check-label">Admin</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="user_type" value="examinar">
				<label class="form-check-label">Examinar</label>
			</div>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in</p>
				<form id="loginForm">
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email" name="email_id">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password" id="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock" onclick="toggleAttributesPass();" style="cursor: pointer;"></span>
							</div>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-12 text-right">
						<button type="submit" class="btn btn-primary btn-block btn-login">Sign In</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/adminlte.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/login.js"></script>
	<script type="text/javascript">
		var baseUrl = "<?=base_url()?>";
	</script>
	<script type="text/javascript">
		function toggleAttributesPass(){
			var input = document.getElementById('password');
			if (input.type =='password') {
				input.setAttribute('type','text');
			} else {
				input.setAttribute('type','password');
			}
		}
	</script>
</body>

</html>
