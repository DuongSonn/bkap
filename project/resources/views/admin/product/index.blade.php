@extends('main.admin')
@section('title','Sản phẩm')
@section('product_index')

	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Danh sách Sản phẩm</h3>
		<!-- TABLE HOVER -->
				<div class="panel">
					<div class="panel-body">
						<div class="col-md-8">
							<a href="{{route('product_add')}}" title="" class="btn btn-default">Thêm mới sản phẩm</a>
						</div>
						

						<div class="col-md-4">
							<form action="" method="get" class="form-inline" role="form">
							
								<div class="form-group">
									<input type="text" class="form-control" name="_search" placeholder="Nhập tên sản phẩm ..." value="{{request()->_search}}">
								</div>
							
								<button type="submit" class="btn btn-primary">Search</button>
							</form>
						</div>
						<br>
						<br>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Ảnh sản phẩm</th>
									<th>Tên sản phẩm</th>
									<th>Giá bán</th>
									<th>Giá giảm</th>
									<th>Trạng thái</th>
									<th>Ngày tạo</th>
									<th>Ngày cập nhật</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($product as $pro)
								<tr>
									<td>{{$pro->id}}</td>
									<td>
										<img src="{{url('/upload')}}/{{$pro->image}}" alt="" width="100">
									</td>
									<td>{{$pro->name}}</td>
									@if($pro->sale_price==0)
									<td>{{$pro->price}}</td>
									@endif
									@if($pro->sale_price>0)
									<td>{{($pro->price)-($pro->sale_price)}}</td>
									@endif
									<td>{{$pro->sale_price}}</td>
									@if($pro->status==0)
									<td>Bán</td>
									@endif
									@if($pro->status==1)
									<td>Chuẩn bị bán</td>
									@endif
									@if($pro->status==-1)
									<td>Hết hàng/Lỗi</td>
									@endif
									<td>{{$pro->created_at}}</td>
									<td>{{$pro->updated_at}}</td>
									<td>
										<a href="{{route('product_update',['id'=>$pro->id])}}" class="btn btn-default">Sửa</a>
										<a href="{{route('product_del',['id'=>$pro->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<div class="clearfix">
							{{$product->appends(request()->only('_search'))->links()}}
						</div>
					</div>
				</div>
				<!-- END TABLE HOVER -->
			</div>	
		</div>
	</div>

@stop()
