<?php  
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;

	/**
	 * summary
	 */
	class Product extends Model
	{
	    /**
	     * summary
	     */
	    protected $table='product';
	    protected $fillable=['name','quantity','price','sale_price','status','image','category_id','brand_id'];
	}
	
?>