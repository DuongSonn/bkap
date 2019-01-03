@extends('main.admin')
@section('title','Tạo tài khoản admin')
@section('admin_add')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Tạo tài khoản admin</h3>
				<div class="panel">
					<div class="panel-body">
						<form action="" method="POST" enctype="multipart/form-data">
						
							<div class="form-group @if($errors->has('name')) has-error @endif">
								<label for="">Tên admin</label>
								<span style="color: #a94442">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
								<input type="text" class="form-control" name="name" placeholder="Nhập tên admin ...">
							</div>
							<div class="form-group @if($errors->has('email')) has-error @endif">
								<label for="">Email</label>
								<span style="color: #a94442">@if($errors->has('email')) {{$errors->first('email')}} @endif</span>
								<input type="email" class="form-control" name="email" placeholder="Nhập email...">
							</div>
							<div class="form-group @if($errors->has('sdt')) has-error @endif">
								<label for="">SĐT</label>
								<span style="color: #a94442">@if($errors->has('sdt')) {{$errors->first('sdt')}} @endif</span>
								<input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại ...">
							</div>
							<div class="form-group @if($errors->has('password')) has-error @endif">
								<label for="">Mật khẩu</label>
								<span style="color: #a94442">@if($errors->has('password')) {{$errors->first('password')}} @endif</span>
								<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu ...">
							</div>
							<div class="form-group @if($errors->has('password_confirm')) has-error @endif">
								<label for="">Xác nhận mật khẩu</label>
								<span style="color: #a94442">@if($errors->has('password_confirm')) {{$errors->first('password_confirm')}} @endif</span>
								<input type="password" class="form-control" name="password_confirm" placeholder="Nhập lại mật khẩu ...">
							</div>
							<div class="form-group">
								<label for="">Ảnh đại diện</label>
								<input type="file" name="file" value="" placeholder="">
							</div>
							<input type="hidden" name="_token" value="{{csrf_token()}}">	
						
							<button type="submit" class="btn btn-primary">Tạo mới</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop()