<?php  
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Brand;
	use Illuminate\Validation\Validator;
	/**
	 * summary
	 */
	class BrandController extends Controller
	{
	    /**
	     * summary
	     */
	    public function index(Request $req)
	    {	
	    	$brand = Brand::paginate(10);
	    	if ($req->_search) {
	    		$brand = Brand::where('name','like','%'.$req->_search.'%')->paginate(10);
	    	}
	        return view('admin.brand.index',[
	        	'brand'=> $brand
	        ]);
	    }
	    public function post_add(Request $req) {
	    	// dd($req->all());
	    	// die;
	    	// $this->validate($req,[
	    	// 	'name'=>'required'
	    	// ],[
	    	// 	'name.required'=>'Tên thương hiệu không được để trống'
	    	// ]);
	    	$rule = [
	    		'name' => 'required|unique:brand'
	    	];
	    	
	    	$msg = [
	    		'name.required'=>'Tên thương hiệu không được để trống',
	    		'name.unique'=>'Tên thương hiệu đã có trong bảng dữ liệu'
	    	];

	    	$validate = \Validator::make($req->all(),$rule,$msg);
	    	if ($validate->passes()) {
	    			if (Brand::create(['name'=>$req->name])) {
	    			return response()->json(['success'=>'Record is successfully added']);
		    	}
		    	else {
		    		return redirect()->route('brand_index')->with('success','Thêm mới danh mục '.$req->name.' thất bại');
		    	}
	    	}else{
				return response()->json(['errors'=>$validate->errors()->all()]);
	    	}
	    
	    }
	    public function delete($id)
	    {
	    	$model=Brand::find($id);
	    	if (Brand::where('id',$id)->delete()) {
	    		return redirect()->route('brand_index')->with('success','Xóa thương hiệu '.$model->name.' thành công');
	    	}
	    	else {
	    		return redirect()->route('brand_index')->with('error','Xóa thương hiệu '.$model->name.' thất bại');
	    	}
	    	// return redirect()->back();
	    }
	     public function update(Request $req) {
	    	$model=Brand::find($req->id);
	    	if (Brand::where('id',$req->id)->update(['name'=>$req->name])) {
	    		return redirect()->route('brand_index')->with('success','Cập nhật danh mục thành công');
	    	}
	    	else {
	    		return redirect()->route('brand_index')->with('error','Cập nhật danh mục thất bại');
	    	}
	    }
	}
?>