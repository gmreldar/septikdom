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
class Page extends Model
{
    const POGREBA_PRAYS    = "POGREBA_PRAYS";
    const CESSON_PRAYS     = "CESSON_PRAYS";
    const SEPTICK_PRAYS    = "SEPTIK_PRAYS";
    const POGREBA_CATALOG  = "POGREBA_CATALOG";
    const CESSON_CATALOG   = "CESSON_CATALOG";
    const SEPTICK_CATALOG  = "SEPTIK_CATALOG";
    use SoftDeletes;

    public $table = 'pages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'code',
        'image',
        'title',
        'description',
        'keywords',
        'likes',
        'views'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'image' => 'string',
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'likes' => 'integer',
        'views' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'code' => 'nullable|string|max:255',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'keywords' => 'nullable|string'
    ];

    public static function getAll(){
        return self::pluck('name', 'id');
    }

    public function texts(){
        return $this->hasMany(Text::class, 'page_id');
    }
}
