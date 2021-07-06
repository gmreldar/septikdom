<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Text
 * @package App\Models
 * @version October 7, 2018, 7:06 pm MSK
 *
 * @property string name
 * @property string text
 * @property integer page_id
 */
class Text extends Model
{
    use SoftDeletes;

    public $table = 'texts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'text',
        'page_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'text' => 'string',
        'page_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'text' => 'nullable|string'
    ];

    public function page(){
        return $this->belongsTo(Page::class, 'page_id');
    }
}
