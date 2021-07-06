<?php

namespace App\Models;

use App\Mail\NotificationMail;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

/**
 * Class Comment
 * @package App\Models
 * @version October 9, 2018, 9:47 pm MSK
 *
 * @property integer product_id
 * @property string name
 * @property string contacts
 * @property date datePublic
 * @property time timePublic
 * @property string text
 * @property string is_active
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',
        'name',
        'contacts',
        'text',
        'is_active',
        'created_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'product_id' => 'integer',
        'name' => 'string',
        'contacts' => 'string',
        'text' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'required'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $emails = Contact::first()->emails;
            if ($emails) {
                $emails = explode(',', $emails);
                foreach ($emails as $email) {
                    Mail::to(trim($email))->send(new NotificationMail('Новый комментарий! ' . $model->name . ' ' . $model->contacts));
                }
            }
        });
    }

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public static function newsCount(){
        return self::where('is_active', 0)->count();
    }
}
