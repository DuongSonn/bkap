@extends('main.admin')
@section('title','Sửa thông tin')
@section('admin_update')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Admin {{$admin->name}}</h3>
				<div class="panel">
					<div class="panel-body">
						<form action="" method="POST" enctype="multipart/form-data">
						
							<div class="form-group @if($errors->has('name')) has-error @endif">
								<label for="">Tên admin</label>
								<span style="color: #a94442">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
								<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục ..." value="{{$admin->name}}">
							</div>
							<div class="form-group @if($errors->has('email')) has-error @endif">
								<label for="">Email</label>
								<span style="color: #a94442">@if($errors->has('email')) {{$errors->first('email')}} @endif</span>
								<input type="email" class="form-control" name="email" placeholder="Nhập số lượng sản phầm" value="{{$admin->email}}">
							</div>
							<div class="form-group @if($errors->has('sdt')) has-error @endif">
								<label for="">Số điện thoại</label>
								<span style="color: #a94442">@if($errors->has('sdt')) {{$errors->first('sdt')}} @endif</span>
								<input type="text" class="form-control" name="sdt" placeholder="Nhập giá sản phẩm ..." value="{{$admin->sdt}}">
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Ảnh đại diện</label>
										
								</div>
								<div class="thumbnail">
									<img src="{{url('/upload')}}/{{$admin->image}}" alt="" width="100">
								</div>
								<p>{{$admin->image}}</p>
								<input type="file" name="file" value="" placeholder="">
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