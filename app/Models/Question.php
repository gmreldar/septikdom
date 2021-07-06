<?php

namespace App\Models;

use App\Traits\OrderableTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package App\Models
 * @version April 19, 2019, 5:37 pm MSK
 *
 * @property integer ord
 * @property string name
 * @property string text
 */
class Question extends Model
{
    use SoftDeletes;
    use OrderableTrait;

    public $table = 'questions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ord',
        'name',
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ord' => 'integer',
        'name' => 'string',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'text' => 'required|string'
    ];

    
}
