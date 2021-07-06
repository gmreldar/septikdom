<?php

namespace App\Models;

use App\Traits\OrderableTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HeadSlide
 * @package App\Models
 * @version April 18, 2019, 1:50 pm MSK
 *
 * @property string text1
 * @property string text2
 * @property string image
 */
class HeadSlide extends Model
{
    use SoftDeletes;
    use OrderableTrait;

    public $table = 'head_slides';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'text1',
        'text2',
        'image',
        'ord'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'text1' => 'string',
        'text2' => 'string',
        'image' => 'string',
        'ord' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'text1' => 'required|string|max:255',
        'text2' => 'nullable|string|max:255'
    ];

    
}
