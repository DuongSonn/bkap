<?php  
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Product;
	use App\Models\Product_detail;
	use App\Models\Product_image;
	use App\Models\Brand;
	use App\Models\Category;
	/**
	 * summary
	 */
	class ProductController extends Controller
	{
	    /**
	     * summary
	     */
	    public function index(Request $req)
	    {	
	    	$product = Product::orderBy('id','DESC')->paginate(10);
	    	if ($req->_search) {
	    		$product= Product::where('name','like','%'.$req->_search.'%')->orderBy('id','DESC')->paginate(10);
	    	}
	        return view('admin.product.index',[
	        	'product'=> $product
	        ]);
	    }
	    public function add() {
	    	return view('admin.product.add',[
	    		'brand'=>Brand::orderBy('name','ASC')->get(),
	    		'category'=>Category::orderBy('name','ASC')->get(),
	    	]);
	    }


	    public function post_add(Request $req) {

	    	$this->validate($req,[
	    		'name' =>'required|unique:product,name',
	    		'quantity'=>'required',
	    		'price'=>'required',
	    		'status'=>'required',
	    		'brand_id'=>'required',
	    		'category_id'=>'required'
	    	],[
	    		'name.required' => '*Tên sản phẩm không được để rỗng',
	    		'name.unique' => '*Sản phẩm đã có trong bảng dữ liệu',
	    		'quantity.required' => '*Số lượng sản phẩm không được để rỗng',
	    		'price.required' => '*Giá sản phẩm không được để rỗng',
	    		'status.required' => '*Chọn trạng thái cho sản phẩm',
	    		'brand_id.required' => '*Chọn thương hiệu cho sản phẩm',
	    		'category_id.required' => '*Chọn danh mục cho sản phẩm'
	    	]);


	    	if($req->hasFile('file')) {
	    		$req->file->move(base_path('upload'),$req->file->getClientOriginalName());
	    		$req->merge(['image' => $req->file->getClientOriginalName()]);
	    	}
	    	if($req->hasFile('file_1')) {
	    		$req->file_1->move(base_path('upload'),$req->file_1->getClientOriginalName());
	    		$req->merge(['img_1' => $req->file_1->getClientOriginalName()]);
	    	}
	    	if($req->hasFile('file_2')) {
	    		$req->file_2->move(base_path('upload'),$req->file_2->getClientOriginalName());
	    		$req->merge(['img_2' => $req->file_2->getClientOriginalName()]);
	    	}
	    	if($req->hasFile('file_3')) {
	    		$req->file_3->move(base_path('upload'),$req->file_3->getClientOriginalName());
	    		$req->merge(['img_3' => $req->file_3->getClientOriginalName()]);
	    	}
	    	$pro=Product::create([
	    		'name'=> $req->input('name'),
	    		'quantity'=> $req->input('quantity'),
	    		'price'=> $req->input('price'),
	    		'sale_price'=> $req->input('sale_price'),
	    		'status'=> $req->input('status'),
	    		'brand_id'=> $req->input('brand_id'),
	    		'category_id'=> $req->input('category_id'),
	    		'image'=> $req->input('image'),
	    	]);
	    	$pro_detail=Product_detail::create([
	    		'color'=> $req->input('color'),
	    		'chip'=> $req->input('chip'),
	    		'resolution'=> $req->input('resolution'),
	    		'ram'=> $req->input('ram'),
	    		'product_id'=> $pro->id,
	    	]);
	    	$pro_image=Product_image::create([
	    		'img_1'=> $req->input('img_1'),
	    		'img_2'=> $req->input('img_2'),
	    		'img_3'=> $req->input('img_3'),
	    		'product_id'=> $pro->id,
	    	]);
	    	// echo '<pre>';
	    	// print_r($pro_image);
	    	// die;
	    	// echo '</pre>';
	    	// Product::create($req->all());
	    	return redirect()->route('product_index')->with('success','Thêm mới sản phẩm '.$pro->name.' thành công');
	    	// if(Product::create($req->all()) {
	    	// 	return redirect()->route('product_index')->with('success','Thêm mới danh mục '.$req->name.' thành công');
	    	// } else {
	    	// 	return redirect()->back()->with('error','Thêm mới sản phẩm '.$req->name.' thất bại');
	    	// }
	    }


	    public function delete($id)
	    {
	    	$model=Product::find($id);
	    	Product_detail::where('product_id',$id)->delete();
	    	Product_image::where('product_id',$id)->delete();
	    	if (Product::where('id',$id)->delete()) {
	    		return redirect()->route('product_index')->with('success','Xóa sản phẩm thành công');
	    	}
	    	else {
	    		return redirect()->route('product_index')->with('error','Xóa sản phẩm thất bại');
	    	}
	    }
	    public function update($id, Request $req)
	    {	
	    	$pro=Product::find($id);
	    	$pro_detail=Product_detail::where('product_id','=',$id)->first();
	    	$pro_image=Product_image::where('product_id','=',$id)->first();
	    	// $pro_brand=Brand::where('id','=',$pro->brand_id);

	    	// dd($pro_brand);
	    	// die;
	    	if ($req->isMethod('post')) {
	    		if ($req->name == $pro->name) {
	    			$this->validate($req,[
		    		'name' =>'required',
		    		'quantity'=>'required',
		    		'price'=>'required',
		    		'status'=>'required',
		    		'brand_id'=>'required',
		    		'category_id'=>'required'
		    	],[
		    		'name.required' => '*Tên sản phẩm không được để rỗng',
		    		'name.unique' => '*Sản phẩm đã có trong bảng dữ liệu',
		    		'quantity.required' => '*Số lượng sản phẩm không được để rỗng',
		    		'price.required' => '*Giá sản phẩm không được để rỗng',
		    		'status.required' => '*Chọn trạng thái cho sản phẩm',
		    		'brand_id.required' => '*Chọn thương hiệu cho sản phẩm',
		    		'category_id.required' => '*Chọn danh mục cho sản phẩm'
		    	]);
	    		} else {
	    			$this->validate($req,[
		    		'name' =>'required|unique:product,name',
		    		'quantity'=>'required',
		    		'price'=>'required',
		    		'status'=>'required',
		    		'brand_id'=>'required',
		    		'category_id'=>'required'
		    	],[
		    		'name.required' => '*Tên sản phẩm không được để rỗng',
		    		'name.unique' => '*Sản phẩm đã có trong bảng dữ liệu',
		    		'quantity.required' => '*Số lượng sản phẩm không được để rỗng',
		    		'price.required' => '*Giá sản phẩm không được để rỗng',
		    		'status.required' => '*Chọn trạng thái cho sản phẩm',
		    		'brand_id.required' => '*Chọn thương hiệu cho sản phẩm',
		    		'category_id.required' => '*Chọn danh mục cho sản phẩm'
		    	]);
	    		}

	    		if($req->hasFile('file')) {
		    		$req->file->move(base_path('upload'),$req->file->getClientOriginalName());
		    		$req->merge(['image' => $req->file->getClientOriginalName()]);
		    	} else {
		    		$req->merge(['image' => $pro->image]);
		    	}
		    	if($req->hasFile('file_1')) {
		    		$req->file_1->move(base_path('upload'),$req->file_1->getClientOriginalName());
		    		$req->merge(['img_1' => $req->file_1->getClientOriginalName()]);
		    	} else {
		    		$req->merge(['img_1' => $pro_image->img_1]);
		    	}
		    	if($req->hasFile('file_2')) {
		    		$req->file_2->move(base_path('upload'),$req->file_2->getClientOriginalName());
		    		$req->merge(['img_2' => $req->file_2->getClientOriginalName()]);
		    	} else {
		    		$req->merge(['img_2' => $pro_image->img_2]);
		    	}
		    	if($req->hasFile('file_3')) {
		    		$req->file_3->move(base_path('upload'),$req->file_3->getClientOriginalName());
		    		$req->merge(['img_3' => $req->file_3->getClientOriginalName()]);
		    	} else {
		    		$req->merge(['img_3' => $pro_image->img_3]);
		    	}

	    		$pro=Product::where('id',$id)->update([
		    		'name'=> $req->input('name'),
		    		'quantity'=> $req->input('quantity'),
		    		'price'=> $req->input('price'),
		    		'sale_price'=> $req->input('sale_price'),
		    		'status'=> $req->input('status'),
		    		'brand_id'=> $req->input('brand_id'),
		    		'category_id'=> $req->input('category_id'),
		    		'image'=> $req->input('image'),
		    	]);
		    	$pro_detail=Product_detail::where('product_id','=',$id)->update([
		    		'color'=> $req->input('color'),
		    		'chip'=> $req->input('chip'),
		    		'resolution'=> $req->input('resolution'),
		    		'ram'=> $req->input('ram'),
		    	]);
		    	$pro_image=Product_image::where('product_id','=',$id)->update([
		    		'img_1'=> $req->input('img_1'),
		    		'img_2'=> $req->input('img_2'),
		    		'img_3'=> $req->input('img_3'),
		    	]);

		    	return redirect()->route('product_index')->with('success','Cập nhật sản phẩm thành công');
	    	}
	    	return view('admin.product.update',[
	    		'pro'=>$pro,
	    		'pro_detail'=>$pro_detail,
	    		'pro_image'=>$pro_image,
	    		// 'pro_brand'=>$pro_brand,
	    		'brand'=>Brand::orderBy('name','ASC')->get(),
	    		'category'=>Category::orderBy('name','ASC')->get(),
	    	]);
	    }
	}
?>