<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OrderableTrait;

/**
 * Class Video
 * @package App\Models
 * @version October 10, 2018, 12:19 am MSK
 *
 * @property string name
 * @property string link
 * @property string description
 * @property string image
 * @property string alt
 * @property integer ord
 */
class Video extends Model
{
    use SoftDeletes;
    use OrderableTrait;

    public $table = 'videos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'link',
        'description',
        'image',
        'alt',
        'ord'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'link' => 'string',
        'description' => 'string',
        'image' => 'string',
        'alt' => 'string',
        'ord' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'link' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'alt' => 'nullable|string|max:255'
    ];

    
}
