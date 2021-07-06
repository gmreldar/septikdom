<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LinkedTrait;
use App\Traits\OrderableTrait;
use Illuminate\Support\Facades\Cache;

/**
 * Class CharacteristicCategory
 * @package App\Models
 * @version September 26, 2018, 3:34 pm MSK
 *
 * @property integer level
 * @property string name
 */
class CharacteristicCategory extends Model
{
    use SoftDeletes;
    use LinkedTrait;
    use OrderableTrait;

    public $table = 'characteristic_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
    ];


}
