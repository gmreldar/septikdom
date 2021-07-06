<?php

namespace App\Models;

use App\Traits\OrderableTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogoSlide
 * @package App\Models
 * @version April 18, 2019, 1:57 pm MSK
 *
 * @property string image
 * @property string alt
 * @property string url
 * @property integer ord
 */
class LogoSlide extends Model
{
    use SoftDeletes;
    use OrderableTrait;

    public $table = 'logo_slides';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'image',
        'alt',
        'url',
        'ord'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'alt' => 'string',
        'url' => 'string',
        'ord' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'alt' => 'nullable|string|max:255',
        'url' => 'nullable|string|max:255'
    ];

    
}
