<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Trang quản trị</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{url('/')}}/public/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/public/admin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('/')}}/public/admin/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{url('/')}}/node_modules/sweetalert2/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="{{url('/')}}/public/admin/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{url('/')}}/public/admin/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/public/admin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/public/admin/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{url('/')}}/public/admin/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="form-group @if($errors->has('email')) has-error @endif">
									<label class="control-label sr-only">Email</label>
									<span style="color: #a94442">@if($errors->has('email')) {{$errors->first('email')}} @endif</span>
									<input type="email" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="form-group  @if($errors->has('password')) has-error @endif">
									<span style="color: #a94442">@if($errors->has('password')) {{$errors->first('password')}} @endif</span>
									<label class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="{{route('forgot_password')}}">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

	<script src="{{url('/')}}/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script src="{{url('/')}}/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
	@if(Session::has('success'))
	<script>
		Swal({
		  position: 'center',
		  type: 'success',
		  title: "{{Session::get('success')}}",
		  showConfirmButton: false,
		  timer: 1500
		})
	</script>		
	@endif
	@if(Session::has('error'))
	<script>
		Swal({
		  position: 'center',
		  type: 'error',
		  title: "{{Session::get('error')}}",
		  showConfirmButton: false,
		  timer: 1500
		})
	</script>	
	@endif
</body>

</html>
