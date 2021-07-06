<?php

namespace App\Models;

use App\Http\Controllers\MainController;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OrderableTrait;
use App\Traits\LinkedTrait;

/**
 * Class Service
 * @package App\Models
 * @version October 6, 2018, 1:36 am MSK
 *
 * @property string name
 * @property string link
 * @property integer ord
 * @property string image
 * @property string annotation
 * @property string text
 * @property integer views
 * @property string title
 * @property string description
 * @property string keywords
 * @property boolean is_active
 * @property integer likes
 */
class Service extends Model
{
    use SoftDeletes;
    use OrderableTrait;
    use LinkedTrait;

    public $table = 'services';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'link',
        'ord',
        'image',
        'alt',
        'annotation',
        'text',
        'views',
        'title',
        'description',
        'keywords',
        'seo_image',
        'is_active',
        'likes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'link' => 'string',
        'ord' => 'integer',
        'image' => 'string',
        'alt' => 'string',
        'annotation' => 'string',
        'text' => 'string',
        'views' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'seo_image' => 'string',
        'is_active' => 'boolean',
        'likes' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'alt' => 'nullable|string|max:255',
        'link' => 'nullable|string|max:255',
        'annotation' => 'nullable|string',
        'text' => 'nullable|string',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'keywords' => 'nullable|string',
        'is_active' => 'nullable|boolean'
    ];

}
