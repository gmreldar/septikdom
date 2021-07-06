<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OrderableTrait;

/**
 * Class License
 * @package App\Models
 * @version October 10, 2018, 12:20 am MSK
 *
 * @property string image
 * @property string alt
 * @property integer ord
 */
class License extends Model
{
    use SoftDeletes;
    use OrderableTrait;

    public $table = 'licenses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'alt' => 'required|string|max:255'
    ];

    
}
