<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models
 * @version October 10, 2018, 12:25 am MSK
 *
 * @property sting phone
 * @property string in
 * @property string fb
 * @property string vk
 * @property string email
 * @property string schedule
 * @property string address
 * @property string map
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'phone',
        'yt',
        'in',
        'fb',
        'vk',
        'tg',
        'wa',
        'email',
        'schedule',
        'address',
        'map',
        'image',
        'emails',
        'well_150',
        'well_200',
        'formwork',
        'cable',
        'cable2',
        'hot_cable',
        'about_image',
        'phone_class',
        'concrete_slab',
        'pipeline_length10',
        'pipeline_length20',
        'pipeline_length'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'in' => 'string',
        'yt' => 'string',
        'fb' => 'string',
        'vk' => 'string',
        'tg' => 'string',
        'wa' => 'string',
        'email' => 'string',
        'schedule' => 'string',
        'address' => 'string',
        'map' => 'string',
        'image' => 'string',
        'about_image' => 'string',
        'phone_class' => 'string',
        'emails' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'phone' => 'nullable|string|max:255',
        'phone_class' => 'nullable|string|max:255',
        'in' => 'nullable|string|max:255',
        'yt' => 'nullable|string|max:255',
        'fb' => 'nullable|string|max:255',
        'vk' => 'nullable|string|max:255',
        'tg' => 'nullable|string|max:255',
        'wa' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'schedule' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'map' => 'nullable|string|max:255',
        'emails' => 'nullable|string|max:255',
        'well_150' => 'nullable|numeric',
        'well_200' => 'nullable|numeric',
        'formwork' => 'nullable|numeric',
        'concrete_slab' => 'nullable|numeric',
        'pipeline_length20' => 'nullable|numeric',
        'pipeline_length10' => 'nullable|numeric',
        'pipeline_length' => 'nullable|numeric',
        'cable' => 'nullable|numeric',
        'cable2' => 'nullable|numeric',
        'hot_cable' => 'nullable|numeric'
    ];

    
}
