<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class District extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'district';	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'slug', 'city_id', 'display_order', 'meta_id', 'id_dothi', 'status'];

    public function ward(){
        return $this->hasMany('App\Models\Ward', 'district_id');
    }
}
