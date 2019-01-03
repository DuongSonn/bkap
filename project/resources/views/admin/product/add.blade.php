@extends('main.admin')
@section('title','Thêm mới Sản phẩm')
@section('product_add')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Thêm mới Sản phẩm</h3>
				<div class="panel">
					<div class="panel-body">
						<form action="" method="POST" enctype="multipart/form-data">
						
							<div class="form-group @if($errors->has('name')) has-error @endif">
								<label for="">Tên sản phẩm</label>
								<span style="color: #a94442">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
								<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục ...">
							</div>
							<div class="form-group @if($errors->has('quantity')) has-error @endif">
								<label for="">Số lượng sản phầm</label>
								<span style="color: #a94442">@if($errors->has('quantity')) {{$errors->first('quantity')}} @endif</span>
								<input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng sản phầm">
							</div>
							<div class="form-group @if($errors->has('price')) has-error @endif">
								<label for="">Giá sản phầm</label>
								<span style="color: #a94442">@if($errors->has('price')) {{$errors->first('price')}} @endif</span>
								<input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm ...">
							</div>
							<div class="form-group">
								<label for="">Giá giảm</label>
								<input type="text" class="form-control" name="sale_price" placeholder="Nhập giá giảm ...">
							</div>
							<div class="form-group">
								<label for="">Trạng thái</label>
								<select name="status" class="form-control">
									<option value="0">Bán</option>
									<option value="1">Chuẩn bị bán</option>
									<option value="-1">Hết hàng/Lỗi</option>	
								</select>
							</div>
							<div class="form-group">
								<label for="">Thương hiệu</label>
								<span style="color: #a94442">@if($errors->has('brand_id')) {{$errors->first('brand_id')}} @endif</span>
								<select name="brand_id" class="form-control">
									<option value="">Chọn thương hiệu</option>
									@foreach ($brand as $br)
									<option value="{{$br->id}}">{{$br->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="" >Danh mục</label>
								<span style="color: #a94442">@if($errors->has('category_id')) {{$errors->first('category_id')}} @endif</span>
								<select name="category_id" class="form-control">
									<option value="">Chọn danh mục</option>
									@foreach ($category as $cat)
									<option value="{{$cat->id}}">{{$cat->name}}</option>
									@endforeach
								</select>
							</div>

							<!-- Laptop -->
							<div class="form-group">
								<label for="">Màu sắc</label>
								<input type="text" class="form-control" name="color" placeholder="Nhập màu sản phẩm ...">
							</div>
							<div class="form-group">
								<label for="">Chip</label>
								<input type="text" class="form-control" name="chip" placeholder="Nhập chip sản phầm ...">
							</div>
							<div class="form-group">
								<label for="">Màn hình</label>
								<input type="text" class="form-control" name="resolution" placeholder="Nhập kích cỡ màn hình ...">
							</div>
							<div class="form-group">
								<label for="">Ram</label>
								<input type="text" class="form-control" name="ram" placeholder="Nhập ram sản phẩm ...">
							</div>
							<!-- End for Laptop -->
							<div class="form-group">
								<label for="">Ảnh đại diện sản phẩm</label>
								<input type="file" name="file" value="" placeholder="">
							</div>
							<div class="form-group">
								<label for="">Ảnh chi tiết sản phẩm</label>
								<input type="file" name="file_1" value="" placeholder="">
								<input type="file" name="file_2" value="" placeholder="">
								<input type="file" name="file_3" value="" placeholder="">
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