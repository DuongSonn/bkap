@extends('main.admin')
@section('title','Sửa sản phẩm')
@section('product_update')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Sản phẩm {{$pro->name}}</h3>
				<div class="panel">
					<div class="panel-body">
						<form action="" method="POST" enctype="multipart/form-data">
						
							<div class="form-group @if($errors->has('name')) has-error @endif">
								<label for="">Tên sản phẩm</label>
								<span style="color: #a94442">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
								<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục ..." value="{{$pro->name}}">
							</div>
							<div class="form-group @if($errors->has('quantity')) has-error @endif">
								<label for="">Số lượng sản phầm</label>
								<span style="color: #a94442">@if($errors->has('quantity')) {{$errors->first('quantity')}} @endif</span>
								<input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng sản phầm" value="{{$pro->quantity}}">
							</div>
							<div class="form-group @if($errors->has('price')) has-error @endif">
								<label for="">Giá sản phầm</label>
								<span style="color: #a94442">@if($errors->has('price')) {{$errors->first('price')}} @endif</span>
								<input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm ..." value="{{$pro->price}}">
							</div>
							<div class="form-group">
								<label for="">Giá giảm</label>
								<input type="text" class="form-control" name="sale_price" placeholder="Nhập giá giảm ..." value="{{$pro->sale_price}}">
							</div>
							<div class="form-group">
								<label for="">Trạng thái</label>
								<select name="status" class="form-control">
									<option value="0" @if($pro->status==0) selected @endif>Bán</option>
									<option value="1" @if($pro->status==1) selected @endif>Chuẩn bị bán</option>
									<option value="-1" @if($pro->status==2) selected @endif>Hết hàng/Lỗi</option>	
								</select>
							</div>
							<div class="form-group">
								<label for="">Thương hiệu</label>
								<span style="color: #a94442">@if($errors->has('brand_id')) {{$errors->first('brand_id')}} @endif</span>
								<select name="brand_id" class="form-control">
									@foreach ($brand as $br)
									<option value="{{$br->id}}" @if($br->id == $pro->brand_id) selected @endif>{{$br->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="" >Danh mục</label>
								<span style="color: #a94442">@if($errors->has('category_id')) {{$errors->first('category_id')}} @endif</span>
								<select name="category_id" class="form-control">
									@foreach ($category as $cat)
									<option value="{{$cat->id}}" @if($cat->id == $pro->category_id) selected @endif>{{$cat->name}}</option>
									@endforeach
								</select>
							</div>

							<!-- Laptop -->
							<div class="form-group">
								<label for="">Màu sắc</label>
								<input type="text" class="form-control" name="color" placeholder="Nhập màu sản phẩm ..." value="{{$pro_detail->color}}">
							</div>
							<div class="form-group">
								<label for="">Chip</label>
								<input type="text" class="form-control" name="chip" placeholder="Nhập chip sản phầm ..." value="{{$pro_detail->chip}}">
							</div>
							<div class="form-group">
								<label for="">Màn hình</label>
								<input type="text" class="form-control" name="resolution" placeholder="Nhập kích cỡ màn hình ..." value="{{$pro_detail->resolution}}">
							</div>
							<div class="form-group">
								<label for="">Ram</label>
								<input type="text" class="form-control" name="ram" placeholder="Nhập ram sản phẩm ..." value="{{$pro_detail->ram}}">
							</div>
							<!-- End for Laptop -->

							<div class="col-md-3">
								<div class="form-group">
									<label for="">Ảnh đại diện sản phẩm</label>
										
								</div>
								<div class="thumbnail">
									<img src="{{url('/upload')}}/{{$pro->image}}" alt="" width="100">
								</div>
								<p>{{$pro->image}}</p>
								<input type="file" name="file" value="" placeholder="">
							</div>

							<!-- Ảnh chi tiết sản phẩm  -->
							<div class="col-md-9">
								<div class="form-group">
									<label for="">Ảnh chi tiết sản phẩm</label>
								</div>
								<div class="col-md-4">
									<div class="thumbnail">
										<img src="{{url('/upload')}}/{{$pro_image->img_1}}" alt="" width="100">
									</div>
									<p>{{$pro_image->img_1}}</p>
									<input type="file" name="file_1" value="" placeholder="">
								</div>
								<div class="col-md-4">
									<div class="thumbnail">
										<img src="{{url('/upload')}}/{{$pro_image->img_2}}" alt="" width="100">
									</div>
									<p>{{$pro_image->img_2}}</p>
									<input type="file" name="file_2" value="" placeholder="">
								</div>
								<div class="col-md-4">
									<div class="thumbnail">
										<img src="{{url('/upload')}}/{{$pro_image->img_3}}" alt="" width="100">
									</div>
									<p>{{$pro_image->img_3}}</p>
									<input type="file" name="file_3" value="" placeholder="">
								</div>

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

@stop()