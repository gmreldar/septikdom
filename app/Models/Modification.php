<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cache;

/**
 * Class Modification
 * @package App\Models
 * @version September 26, 2018, 3:31 pm MSK
 *
 * @property integer product_id
 * @property float price
 * @property date datePublic
 * @property string annotation
 * @property string image
 * @property integer sale
 * @property string lastmod
 * @property float volume
 * @property string destination
 * @property string modtitle
 * @property float proizvoditelnost
 * @property float glubina
 * @property string gabarit
 * @property float power
 * @property float massa
 * @property integer chel
 * @property integer topasid
 * @property integer evroid
 * @property float oldprice
 * @property integer sort_main
 * @property float ueprice
 * @property integer ueid
 * @property boolean showcalc
 * @property integer topassid
 * @property integer discount
 */
class Modification extends Model
{
    use SoftDeletes;

    public $table = 'modifications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    const DESTINATION = [
        0 => 'самотечный способ',
        1 => 'принудительный способ'
    ];

    public $fillable = [
        'product_id',
        'price',
        'datePublic',
        'annotation',
        'image',
        'sale',
        'lastmod',
        'volume',
        'destination',
        'modtitle',
        'proizvoditelnost',
        'glubina',
        'gabarit',
        'power',
        'massa',
        'chel',
        'topasid',
        'evroid',
        'oldprice',
        'sort_main',
        'ueprice',
        'ueid',
        'showcalc',
        'topassid',
        'discount',
        'useful_volume',
        'weight',
        'entry',
        'equipment',
        'extended_neck',
        'fasteners'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'price' => 'float',
        'annotation' => 'string',
        'image' => 'string',
        'sale' => 'integer',
        'lastmod' => 'string',
        'volume' => 'float',
        'destination' => 'string',
        'modtitle' => 'string',
        'proizvoditelnost' => 'float',
        'glubina' => 'float',
        'gabarit' => 'string',
        'power' => 'float',
        'massa' => 'float',
        'chel' => 'integer',
        'topasid' => 'integer',
        'evroid' => 'integer',
        'oldprice' => 'float',
        'sort_main' => 'integer',
        'ueprice' => 'float',
        'ueid' => 'integer',
        'showcalc' => 'boolean',
        'topassid' => 'integer',
        'discount' => 'integer',
        'useful_volume' => 'integer',
        'weight' => 'integer',
        'entry' => 'string',
        'equipment' => 'string',
        'extended_neck' => 'integer',
        'fasteners' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required|numeric',
        'price' => 'nullable|numeric',
        'annotation' => 'nullable|string',
        'image' => 'nullable|string',
        'sale' => 'nullable|numeric',
        'lastmod' => 'nullable|string',
        'volume' => 'nullable|numeric',
        'destination' => 'nullable|numeric',
        'modtitle' => 'required|string',
        'proizvoditelnost' => 'nullable|numeric',
        'glubina' => 'nullable|numeric',
        'gabarit' => 'nullable|string',
        'power' => 'nullable|numeric',
        'massa' => 'nullable|numeric',
        'chel' => 'nullable|numeric',
        'topasid' => 'nullable|numeric',
        'evroid' => 'nullable|numeric',
        'sort_main' => 'nullable|numeric',
        'ueprice' => 'nullable|numeric',
        'ueid' => 'nullable|numeric',
        'showcalc' => 'nullable|boolean',
        'topassid' => 'nullable|numeric',
        'discount' => 'nullable|numeric',
        'useful_volume' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'entry' => 'nullable|string',
        'equipment' => 'nullable|string',
        'extended_neck' => 'nullable|numeric',
        'fasteners' => 'nullable|numeric'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $model->forgetPrice();
            Modification::where('product_id', $model->product_id)->update(['chel' => $model->chel]);
            Product::find($model->product_id)->update(['chel' => $model->chel]);
        });

        self::updating(function ($model) {
            $oldModel = self::find($model->id);
            if ($model->chel != $oldModel->chel) {
                self::where('product_id', $model->product_id)->update(['chel' => $model->chel]);
                Product::find($model->product_id)->update(['chel' => $model->chel]);
            }
        });

        self::updated(function ($model) {
            $model->forgetPrice();
        });

        self::deleted(function ($model) {
            $model->forgetPrice();
        });
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public static function getAll()
    {
        return self::pluck('modtitle', 'id');
    }

    public function forgetPrice()
    {
        Cache::forget('sale_' . $this->product_id);
        Cache::forget('price_' . 0 . '_' . $this->product_id);
        Cache::forget('price_' . 1 . '_' . $this->product_id);
        Cache::forget('price_' . null . '_' . $this->product_id);
    }
}
