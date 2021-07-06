<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Page
 * @package App\Models
 * @version October 7, 2018, 7:11 pm MSK
 *
 * @property string name
 * @property string image
 * @property string title
 * @property string description
 * @property string keywords
 * @property integer likes
 * @property integer views
 */
class Bestsellers extends Model
{
    public $table = 'bestsellers';
    

    protected $dates = [];


    public $fillable = [
        'product_id',
        'order_num',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'order_num' => 'integer'
    ];

//    public static function getAll(){
//        return self::pluck('name', 'id');
//    }
//
//    public function texts(){
//        return $this->hasMany(Text::class, 'page_id');
//    }
}
