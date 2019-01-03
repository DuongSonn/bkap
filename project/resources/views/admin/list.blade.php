@extends('main.admin')
@section('title','Danh sách admin')
@section('admin_list')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Danh sách Admin</h3>
		<!-- TABLE HOVER -->
				<div class="panel">
					<div class="panel-body">
						<div class="col-md-8">
							<a href="{{route('admin_add')}}" title="" class="btn btn-default">Tạo tài khoản Admin</a>
						</div>
						

						<div class="col-md-4">
							<form action="" method="get" class="form-inline" role="form">
							
								<div class="form-group">
									<input type="text" class="form-control" name="_search" placeholder="Nhập tên admin ..." value="{{request()->_search}}">
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
									<th>Họ tên</th>
									<th>SĐT</th>
									<th>Email</th>
									<th>Ảnh</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $u)
								<tr>
									<td>{{$u->id}}</td>
									<td>{{$u->name}}</td>
									<td>{{$u->sdt}}</td>
									<td>{{$u->email}}</td>
									<td><img src="{{url('/upload')}}/{{$u->image}}" alt="" width="100"></td>
									<td>
										<a href="{{route('admin_del',['id'=>$u->id])}}" class="btn btn-default" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<div class="clearfix">
							{{$user->appends(request()->only('_search'))->links()}}
						</div>
					</div>
				</div>
				<!-- END TABLE HOVER -->
			</div>	
		</div>
	</div>
@stop()