<?php  
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;

	/**
	 * summary
	 */
	class Category extends Model
	{
	    /**
	     * summary
	     */
	   	protected $table='category';
	   	protected $fillable=['name'];
	}
?>