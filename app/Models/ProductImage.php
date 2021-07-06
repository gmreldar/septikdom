<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OrderableTrait;

/**
 * Class ProductImage
 * @package App\Models
 * @version October 11, 2018, 1:21 am MSK
 *
 * @property integer product_id
 * @property string image
 * @property string alt
 * @property integer ord
 */
class ProductImage extends Model
{
    use SoftDeletes;
    use OrderableTrait;

    public $table = 'product_images';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',
        'image',
        'alt',
        'ord',
        'carousels'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'image' => 'string',
        'alt' => 'string',
        'ord' => 'integer',
        'carousels' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'alt' => 'nullable|string|max:255'
    ];

    public function getParentFieldName()
    {
        return 'product_id';
    }
}
