<h1>Xin chào {{$name}}</h1>
<p>
	Đây là email cung cấp đường link để bạn thiết lập lại mk tài khoản admin của bạn.
	Email này được gửi do bạn đã quên mật khẩu đăng nhập admin của mình.
</p>
<a href="{{route('get_pass_admin',['token'=>$token])}}" title="">Vui lòng bấm vào đây để cài mật khẩu mới</a>