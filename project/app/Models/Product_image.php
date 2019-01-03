<?php  
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;

	/**
	 * summary
	 */
	class Product_image extends Model
	{
	    /**
	     * summary
	     */
	    protected $table='product_image';
	    protected $fillable=['img_1','img_2','img_3','product_id'];
	}
	
?>