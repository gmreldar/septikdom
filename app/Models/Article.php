<?php

namespace App\Models;

use Eloquent as Model;
use App\Traits\OrderableTrait;
use App\Traits\LinkedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * @package App\Models
 * @version October 6, 2018, 1:46 am MSK
 *
 * @property string name
 * @property string link
 * @property integer article_category_id
 * @property integer ord
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
class Article extends Model
{
    use SoftDeletes;
    use OrderableTrait;
    use LinkedTrait;

    public $table = 'articles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'link',
        'article_category_id',
        'ord',
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
        'views',
        'discount_menu_img',
        'discount_slider_img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'link' => 'string',
        'article_category_id' => 'integer',
        'ord' => 'integer',
        'image' => 'string',
        'alt' => 'string',
        'annotation' => 'string',
        'text' => 'string',
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
        'alt' => 'nullable|string|max:255',
        'article_category_id' => 'required|numeric',
        'annotation' => 'nullable|string',
        'text' => 'nullable|string',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'keywords' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ];

    public function category(){
        return $this->belongsTo('App\Models\ArticleCategory', 'article_category_id');
    }
}
