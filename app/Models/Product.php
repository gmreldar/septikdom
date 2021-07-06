<?php

namespace App\Models;

use App\Traits\OrderableTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LinkedTrait;
use Cache;

/**
 * Class Product
 * @package App\Models
 * @version September 25, 2018, 5:00 am MSK
 *
 * @property integer product_category_id
 * @property string name
 * @property string link
 * @property string text
 * @property string image
 * @property string title
 * @property string description
 * @property string keywords
 * @property integer sort
 * @property string montazh
 * @property float pesok
 * @property float suglinok
 * @property float glina
 * @property float plyvun
 */
class Product extends Model
{
    use SoftDeletes;
    use LinkedTrait;
    use OrderableTrait;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_category_id',
        'name',
        'link',
        'text',
        'image',
        'title',
        'description',
        'keywords',
        'sort',
        'montazh',
        'pesok',
        'suglinok',
        'glina',
        'plyvun',
        'chel',
        'is_active',
        'wiring_diagram',
        'installation',
        'installation_supervision',
        'technical_certificate',
        'ord',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_category_id' => 'integer',
        'name' => 'string',
        'link' => 'string',
        'text' => 'string',
        'image' => 'string',
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'sort' => 'integer',
        'montazh' => 'string',
        'pesok' => 'float',
        'suglinok' => 'float',
        'glina' => 'float',
        'plyvun' => 'float',
        'chel' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_category_id' => 'required|numeric',
        'name' => 'required|string|max:255',
        'link' => 'nullable|string|max:255',
    ];

    public function modifications(){
        return $this->hasMany('App\Models\Modification', 'product_id')->orderBy('price');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'product_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id');
    }

    public function images(){
        return $this->hasMany('App\Models\ProductImage', 'product_id')->orderBy('ord');
    }

    public function sale(){
        if($this->modifications()->where('discount', '<>', 0)->count())
            return $this->modifications()->where('discount', '<>', 0)->orderBy('discount', 'desc')->select('discount', 'price')->first();
        else
            return false;
    }

    public function price($destination = null){
        if (!is_null($destination)) {
            if($this->modifications()->where('destination', $destination)->count()) {
                $modification =  $this->modifications()->where('destination', $destination)->orderBy('price')->first();
                $price = $modification->price;
                if($modification->discount != 0)
                    $price *= ((100 - $modification->discount)/100);
                return $price;
            }
        } else {
            if($this->modifications()->count()) {
                $modification =  $this->modifications()->orderBy('price')->first();
                $price = $modification->price;
                if($modification->discount != 0)
                    $price *= ((100 - $modification->discount)/100);
                return $price;
            }
        }
        return false;
    }

    public function image(){
        if($this->images()->count())
            return $this->images()->orderBy('ord')->first();
        else
            return false;
    }

    public static function getAll(){
        return self::pluck('name', 'id');
    }

    public static function boot()
    {
        parent::boot();

        self::deleted(function($model){
            Modification::where('product_id', $model->id)->delete();
        });
    }

    public function getParentFieldName()
    {
        return 'product_category_id';
    }

}
