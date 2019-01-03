@extends('main.admin')
@section('title','Cập nhật mật khẩu')
@section('admin_password')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Admin {{$admin->name}}</h3>
			<div class="panel">
				<div class="panel-body">
					<form action="" method="POST">
						<div class="form-group @if($errors->has('password')) has-error @endif">
							<label for="">Mật khẩu cũ</label>
							<span style="color: #a94442">@if($errors->has('password')) {{$errors->first('password')}} @endif</span>
							<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu cũ ..." ">
						</div><div class="form-group @if($errors->has('new_password')) has-error @endif">
							<label for="">Mật khẩu mới</label>
							<span style="color: #a94442">@if($errors->has('new_password')) {{$errors->first('new_password')}} @endif</span>
							<input type="password" class="form-control" name="new_password" placeholder="Nhập mật khẩu mới ...">
						</div><div class="form-group @if($errors->has('confirm_password')) has-error @endif">
							<label for="">Nhập lại mật khẩu mới</label>
							<span style="color: #a94442">@if($errors->has('confirm_password')) {{$errors->first('confirm_password')}} @endif</span>
							<input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu mới...">
						</div>
						<input type="hidden" name="_token" value="{{csrf_token()}}">	

						<div class="col-md-12">
							<br>
							<button type="submit" class="btn btn-primary">Cập nhật</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop