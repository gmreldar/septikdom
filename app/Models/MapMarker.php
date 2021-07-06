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
class MapMarker extends Model
{
    public $table = 'map_markers';
    

    protected $dates = [];


    public $fillable = [
        'lat',
        'lng',
        'product_id',
        'price',
        'comment',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
       // 'price' => 'float'
    ];

//    public static function getAll(){
//        return self::pluck('name', 'id');
//    }
//
//    public function texts(){
//        return $this->hasMany(Text::class, 'page_id');
//    }
}
