<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OrderableTrait;
use App\Traits\LinkedTrait;

/**
 * Class Work
 * @package App\Models
 * @version October 7, 2018, 7:21 pm MSK
 *
 * @property string name
 * @property string link
 * @property string image
 * @property string annotation
 * @property string text
 * @property string title
 * @property string description
 * @property string keywords
 * @property boolean is_active
 * @property integer likes
 * @property integer views
 */
class Work extends Model
{
    use SoftDeletes;
    use OrderableTrait;
    use LinkedTrait;

    public $table = 'works';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'ord',
        'link',
        'image',
        'alt',
        'annotation',
        'text',
        'title',
        'description',
        'keywords',
        'seo_image',
        'is_active',
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
        'link' => 'string',
        'image' => 'string',
        'alt' => 'string',
        'annotation' => 'string',
        'text' => 'string',
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'seo_image' => 'string',
        'is_active' => 'boolean',
        'likes' => 'integer',
        'views' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'link' => 'nullable|string|max:255',
        'annotation' => 'nullable|string|max:255',
        'text' => 'nullable|string',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'keywords' => 'nullable|string'
    ];

    
}
