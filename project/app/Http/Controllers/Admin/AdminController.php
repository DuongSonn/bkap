<?php  
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\User;
	use Illuminate\Http\Request;
	use Auth;
	/**
	 * summary
	 */
	class AdminController extends Controller
	{
	    /**
	     * summary
	     */
	    public function index()
	    {
	        return view('admin.index');
	    }
	    public function list(Request $req)
	    {
	    	$user = User::orderBy('id','DESC')->paginate(10);
	    	if ($req->_search) {
	    		$user= User::where('name','like','%'.$req->_search.'%')->orderBy('id','DESC')->paginate(10);
	    	}
	        return view('admin.list',[
	        	'user'=> $user
	        ]);
	    }
	    public function add() {
	    	return view('admin.add');
	    }
	    public function post_add(Request $req) {

	    	$this->validate($req,[
	    		'name' =>'required|unique:admin,name',
	    		'email'=>'required|unique:admin,email',
	    		'sdt'=>'required',
	    		'password'=>'required',
	    		'password_confirm'=>'required|same:password',
	    	],[
	    		'name.required' => '*Tên admin không được để rỗng',
	    		'name.unique' => '*Admin này đã có tài khoản',
	    		'email.required' => '*Email không được để rỗng',
	    		'email.unique' => '*Email này đã tồn tại',
	    		'email.email' => '*Vui lòng nhậpp đúng định dạng mail',
	    		'sdt.required' => '*SĐT không được để rỗng',
	    		'password.required' => '*Password không được để rỗng',
	    		'password_confirm.required' => '*Xin hãy xác nhận mật khẩu',
	    		'password_confirm.same' => '*Mật khẩu xác nhận sai'
	    	]);


	    	if($req->hasFile('file')) {
	    		$req->file->move(base_path('upload'),$req->file->getClientOriginalName());
	    		$req->merge(['image' => $req->file->getClientOriginalName()]);
	    	}
	    	$req->merge(['password'=>bcrypt($req->password)]);
	    	$admin=User::create([
	    		'name'=> $req->input('name'),
	    		'email'=> $req->input('email'),
	    		'sdt'=> $req->input('sdt'),
	    		'password'=> $req->input('password'),
	    		'image'=> $req->input('image'),
	    	]);
	    	// echo '<pre>';
	    	// print_r($admin);
	    	// die;
	    	// echo '</pre>';
	    	// Product::create($req->all());
	    	if ($admin) {
	    		return redirect()->route('admin_list')->with('success','Tạo tài khoản admin mới thành công');
	    	} else {
	    		return redirect()->back()->with('error','Tạo tài khoản admin mới thẩt bại');
	    	}
	    	
	    	// if(Product::create($req->all()) {
	    	// 	return redirect()->route('product_index')->with('success','Thêm mới danh mục '.$req->name.' thành công');
	    	// } else {
	    	// 	return redirect()->back()->with('error','Thêm mới sản phẩm '.$req->name.' thất bại');
	    	// }
	    }
	    public function delete($id)
	    {
	    	$model=User::find($id);
	    	if (User::where('id',$id)->delete()) {
	    		return redirect()->route('admin_list')->with('success','Xóa tài khoản admin thành công');
	    	}
	    	else {
	    		return redirect()->back()->with('error','Xóa tài khoản admin thất bại');
	    	}
	    }
	    public function login()
	    {
	    	return view('admin.login');
	    }
	    public function post_login(Request $req)
	    {	
	    	$this->validate($req,[
	    		'email'=>'required|email',
	    		'password'=>'required',
	    	],[
	    		'email.required'=>'*Bạn chưa nhập email',
	    		'email.email'=>'*Vui lòng nhập đúng định dạng email',
	    		'password.required'=>'*Bạn chưa nhập mật khẩu'
	    	]);
	    	// dd($req->all());
	    	if (Auth::attempt(['email'=>$req->email,'password'=>$req->password],$req->has('remember'))) {
	    		return redirect()->route('admin_index')->with('success','Đăng nhập thành công');
	    	} else {
	    		return redirect()->back()->with('error','Đăng nhập thất bại vui lòng kiểm tra lại email hoặc mật khẩu');
	    	}
	    }
	    public function logout(){
	    	Auth::logout();
	    	return redirect()->route('login')->with('success','Hẹn gặp lại');
	    }
	    public function update($id, Request $req) {
	    	$admin=User::find($id);
	    	if ($req->isMethod('post')) {
	    		if ($req->name == $admin->name) {
	    			$this->validate($req,[
			    		'name' =>'required',
			    	],[
			    		'name.required' => '*Tên admin không được để rỗng',
			    	]);
	    		} else {
	    			$this->validate($req,[
			    		'name' =>'required|unique:admin,name',
			    	],[
			    		'name.required' => '*Tên admin không được để rỗng',
			    		'name.unique' => '*Admin này đã có tài khoản',
			    	]);
	    		}
	    		if ($req->email == $admin->email) {
	    			$this->validate($req,[
			    		'email' =>'required',
			    	],[
			    		'email.required' => '*Email không được để rỗng',
			    	]);
	    		} else {
	    			$this->validate($req,[
			    		'email' =>'required|unique:admin,email|email',
			    	],[
			    		'email.required' => '*Email không được để rỗng',
			    		'email.unique' => '*Email này đã được sử dụng',
			    		'email.email' => '*Email phải đúng định dạng',
			    	]);
	    		}
	    		if ($req->sdt == $admin->sdt) {
	    			$this->validate($req,[
			    		'sdt' =>'required',
			    	],[
			    		'sdt.required' => '*SĐT không được để rỗng',
			    	]);
	    		} else {
	    			$this->validate($req,[
			    		'sdt' =>'required',
			    	],[
			    		'sdt.required' => '*SĐT không được để rỗng',
			    	]);
	    		}
	    		if($req->hasFile('file')) {
		    		$req->file->move(base_path('upload'),$req->file->getClientOriginalName());
		    		$req->merge(['image' => $req->file->getClientOriginalName()]);
		    	} else {
		    		$req->merge(['image' => $admin->image]);
		    	}
		    	$admin=User::where('id',$id)->update([
		    		'name'=> $req->input('name'),
		    		'email'=> $req->input('email'),
		    		'sdt'=> $req->input('sdt'),
		    		'image'=> $req->input('image'),
			    	]);
		    	return redirect()->back()->with('success','Cập nhật thành công');
	    	}
	    	return view('admin.update',['admin'=>$admin]);
	    }
	    public function password($id, Request $req) {
	    	$admin=User::find($id);
	    	
	    	if ($req->isMethod('post')) {
	    		$this->validate($req,[
	    			'password'=>'required|old_password',
	    			'new_password'=>'required|different:password',
	    			'confirm_password'=>'required|same:new_password',
	    		],[
	    			'password.required'=>'*Vui lòng nhập mật khẩu cũ',
	    			'password.old_password'=>'*Vui lòng nhập đúng mật khẩu cũ',
	    			'new_password.required'=>'*Vui lòng nhập mật khẩu mới',
	    			'new_password.different'=>'*Mật khẩu mới trùng mật khẩu cũ',
	    			'confirm_password.required'=>'*Vui lòng nhập lại mật khẩu mới',
	    			'confirm_password.same'=>'*Vui lòng nhập lại mật khẩu mới vì bạn đã nhập sai',
	    		]);
	    		$req->merge(['password'=>bcrypt($req->new_password)]);
	    		$admin=User::where('id',$id)->update([
		    		'password'=> $req->input('password'),
			    ]);
			    return redirect()->back()->with('success','Cập nhật thành công');
	    	}
	    	return view('admin.password',['admin'=>$admin]);
	    }
	    public function forgot(Request $req) {
	    	if($req->email) {
	    		$this->validate($req,[
	    			'email'=>'exists:admin,email'
	    		],[
	    			'email.exists'=>'Tài khoản dùng email này không tồn tại'
	    		]);
	    		$token = str_random(40);
	    		$user = User::where('email',$req->email)->first();
	    		if (User::where('email',$req->email)->update(['reset_token'=>$token])) {
	    			if(\Mail::send('emails.get_pass_admin', ['token' => $token, 'name'=>$user->name], function($message) use ($req,$user)
					{
					    $message->to($req->email, $user->name)->subject('RESET PASSWORD FOR ADMIN!');
					})){
	    				echo 'Email đã được gửi';
					} else {
						echo 'Email gửi thất bại';
					}
	    		}
	    		

	    	}
	    	return view('admin.forgot');
	    }
	    public function new_pass($token) {
	    	return view('admin.reset');
	    }
	}
?>