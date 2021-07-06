<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LinkedTrait;
use App\Traits\OrderableTrait;
use Illuminate\Support\Facades\Cache;

/**
 * Class ProductCategory
 * @package App\Models
 * @version September 26, 2018, 3:34 pm MSK
 *
 * @property integer level
 * @property string name
 * @property string link
 * @property integer position
 * @property string image
 * @property string text
 * @property string annotation
 * @property string title
 * @property string description
 * @property string keywords
 * @property string public
 */
class ProductCategory extends Model
{
    use SoftDeletes;
    use LinkedTrait;
    use OrderableTrait;

    public $table = 'product_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    const SEPTICS_ID = 1;
    const ACCESSORIES_ID = 2;
    const CELLAR_ID = 3;
    const CAISSON_ID = 4;


    const TYPE = [
        self::SEPTICS_ID => 'Септики',
        self::ACCESSORIES_ID => 'Комплектующие',
        self::CELLAR_ID => 'Погребы',
        self::CAISSON_ID => 'Кессоны'
    ];


    public $fillable = [
        'ord',
        'type',
        'name',
        'short_name',
        'link',
        'position',
        'image',
        'alt',
        'text',
        'annotation',
        'price_list_text',
        'title',
        'description',
        'keywords',
        'seo_image',
        'is_active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ord' => 'integer',
        'type' => 'integer',
        'name' => 'string',
        'link' => 'string',
        'position' => 'integer',
        'image' => 'string',
        'alt' => 'string',
        'text' => 'string',
        'annotation' => 'string',
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'seo_image' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'numeric',
        'name' => 'required|string|max:255',
        'short_name' => 'required|string|max:30',
        'link' => 'nullable|string|max:255',
        'alt' => 'nullable|string|max:255',
        'position' => 'nullable|numeric',
        'text' => 'nullable|string',
        'annotation' => 'nullable|string',
        'title' => 'nullable|string',
        'description' => 'nullable|string',
        'keywords' => 'nullable|string',
    ];

    public static function boot()
    {
        parent::boot();

        self::deleted(function($model){
            Cache::forget('menuProductCategories');
            $products = Product::where('product_category_id', $model->id)->pluck('id');
            if($products->count()) {
                Modification::whereIn('product_id', $products)->delete();
                Product::destroy($products);
            }
        });
        self::created(function($model){
            Cache::forget('menuProductCategories');
        });
        self::updated(function($model){
            Cache::forget('menuProductCategories');
        });
    }

    public static function getAll(){
        return self::pluck('name', 'id');
    }

    public static function getMenu(){
        return self::orderBy('type')
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('id', 'link', 'short_name', 'is_active')
            ->get();
    }

    public function adminProducts(){
        return $this->hasMany('App\Models\Product', 'product_category_id')->orderBy('ord');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'product_category_id')->where('is_active', 1)->orderBy('ord');
    }

    public function productsShort(){
        return $this->hasMany('App\Models\Product', 'product_category_id')->where('is_active', 1)->orderBy('ord')->select('link', 'name', 'is_active');
    }

    public function getParentFieldName()
    {
        return 'type';
    }
}
