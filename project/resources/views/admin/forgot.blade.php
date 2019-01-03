<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Lấy lại mật khẩu</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{url('/')}}/public/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/public/admin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('/')}}/public/admin/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
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
								<p class="lead">Lấy lại mật khẩu</p>
							</div>
							<form class="form-auth-small" action="" method="get">
								@csrf
								<div class="form-group @if($errors->has('email')) has-error @endif">
									<label class="control-label">Email đăng nhập</label>
									<span style="color: #a94442">@if($errors->has('email')) {{$errors->first('email')}} @endif</span>
									<input type="email" class="form-control" name="email" placeholder="Email đăng nhập...">
								</div>					
								<button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>
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
</body>

</html>
