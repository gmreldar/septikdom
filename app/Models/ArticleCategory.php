<?php

namespace App\Models;

use App\Http\Controllers\MainController;
use App\Traits\OrderableTrait;
use App\Traits\LinkedTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArticleCategory
 * @package App\Models
 * @version October 6, 2018, 1:49 am MSK
 *
 * @property string name
 * @property string link
 * @property integer ord
 * @property sting title
 * @property string description
 * @property string keywords
 * @property boolean is_active
 * @property integer likes
 * @property integer views
 */
class ArticleCategory extends Model
{
    use SoftDeletes;
    use OrderableTrait;
    use LinkedTrait;

    public $table = 'article_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'link',
        'ord',
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
        'ord' => 'integer',
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
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'keywords' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ];

    public static function boot()
    {
        parent::boot();

        self::deleted(function($model){
            Article::where('article_category_id', $model->id)->delete();
        });
    }

    public static function getAll(){
        return self::pluck('name', 'id');
    }

    public function articles(){
        return $this->hasMany('App\Models\Article', 'article_category_id');
    }
}
