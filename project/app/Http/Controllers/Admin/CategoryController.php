<?php  
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Category;

	/**
	 * summary
	 */
	class CategoryController extends Controller
	{
	    /**
	     * summary
	     */
	    public function index(Request $req)
	    {	
	    	$category = Category::paginate(10);
	    	if ($req->_search) {
	    		$category= Category::where('name','like','%'.$req->_search.'%')->paginate(10);
	    	}
	        return view('admin.category.index',[
	        	'category'=> $category
	        ]);
	    }
	    public function post_add(Request $req) {
	    	$rule = [
	    		'name' => 'required|unique:category'
	    	];
	    	
	    	$msg = [
	    		'name.required'=>'Tên danh mục không được để trống',
	    		'name.unique'=>'Tên danh mục đã có trong bảng dữ liệu'
	    	];

	    	$validate = \Validator::make($req->all(),$rule,$msg);
	    	if ($validate->passes()) {
	    			if (Category::create(['name'=>$req->name])) {
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
	    	$model=Category::find($id);
	    	if (Category::where('id',$id)->delete()) {
	    		return redirect()->route('category_index')->with('success','Xóa danh mục '.$model->name.' thành công');
	    	}
	    	else {
	    		return redirect()->route('category_index')->with('error','Xóa danh mục '.$model->name.' thất bại');
	    	}
	    }
	    public function update(Request $req) {
	    	$model=Category::find($req->id);
	    	if (Category::where('id',$req->id)->update(['name'=>$req->name])) {
	    		return redirect()->route('category_index')->with('success','Cập nhật danh mục thành công');
	    	}
	    	else {
	    		return redirect()->route('category_index')->with('error','Cập nhật danh mục thất bại');
	    	}
	    }
	}
?>