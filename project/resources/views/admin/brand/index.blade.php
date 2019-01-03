@extends('main.admin')
@section('title','Thương hiệu')
@section('brand_index')
<head>
	<meta name="_token" content="{{csrf_token()}}" />
</head>
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Danh sách Thương hiệu</h3>
		<!-- TABLE HOVER -->
				<div class="panel">
					<div class="panel-body">
						<div class="col-md-8">
							<a class="btn btn-primary" data-toggle="modal" href="#modal-id">Thêm mới Thương hiệu</a>
						</div>
						<div class="modal fade" id="modal-id">
							<div class="modal-dialog">

								<div class="modal-content">

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Thêm mới Thương hiệu</h4>
									</div>
									<div class="modal-body">
										<form action="{{route('brand_add')}}" method="POST" role="form">
											<div class="alert alert-danger" style="display:none"></div>
											<div class="form-group">
												<label for="">Tên thương hiệu</label>
												<input type="text" class="form-control" name="name" placeholder="Input field" id="name">
											</div>
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<!-- <button type="button" type="submit" class="btn btn-default"><a href="{{route('brand_add')}}">Thêm mới</a></button> -->
											<button class="btn btn-default" id="add_brand" type="submit">Thêm mới</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</form>									
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<form action="" method="get" class="form-inline" role="form">
							
								<div class="form-group">
									<input type="text" class="form-control" name="_search" placeholder="Nhập tên thương hiệu...">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>	
							</form>
						</div>

						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên thương hiệu</th>
									<th>Ngày tạo</th>
									<th>Ngày cập nhật</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($brand as $br)
								<tr>
									<td>{{$br->id}}</td>
									<td>{{$br->name}}</td>
									<td>{{$br->created_at}}</td>
									<td>{{$br->updated_at}}</td>
									<td>
										<button type="button" class="btn btn-default">Xem</button>
										<button class="btn btn-primary" data-toggle="modal" href='#modal_update' data-title="{{$br->name}}" data-id="{{$br->id}}" >Sửa</button>
										<a href="{{route('brand_del',['id'=>$br->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<div class="clearfix">
							{{$brand->appends(request()->only('_search'))->links()}}
						</div>
					</div>
				</div>
				<!-- END TABLE HOVER -->
			</div>	
		</div>
	</div>

<div class="modal fade" id="modal_update">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Sửa danh mục</h4>
				</div>
				<div class="modal-body">
					<form action="{{route('brand_update')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="id" id="id">
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục ...">
						</div>
						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
						<button type="submit" class="btn btn-primary">Lưu lại</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@stop()
