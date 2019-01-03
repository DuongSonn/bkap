<?php  
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;

	/**
	 * summary
	 */
	class Product_detail extends Model
	{
	    /**
	     * summary
	     */
	    protected $table='product_detail';
	    protected $fillable=['color','chip','resolution','ram','product_id'];
	}
	
?>