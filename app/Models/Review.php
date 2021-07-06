<?php

namespace App\Models;

use App\Mail\NotificationMail;
use Eloquent as Model;
use App\Traits\OrderableTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Review
 * @package App\Models
 * @version October 10, 2018, 12:16 am MSK
 *
 * @property string name
 * @property string phone
 * @property string city
 * @property string message
 * @property string file
 * @property boolean is_active
 * @property integer ord
 */
class Review extends Model
{
    use OrderableTrait;
    use SoftDeletes;

    public $table = 'reviews';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'phone',
        'city',
        'message',
        'file_type',
        'file',
        'is_active',
        'ord',
        'alt'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'city' => 'string',
        'message' => 'string',
        'is_active' => 'boolean',
        'ord' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'alt' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'message' => 'nullable|string'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $emails = Contact::first()->emails;
            if ($emails) {
                $emails = explode(',', $emails);
                foreach ($emails as $email) {
                    Mail::to(trim($email))->send(new NotificationMail('Новый отзыв! ' . $model->name . ' ' . $model->phone));
                }
            }
        });
    }

    public static function newsCount(){
        return self::where('is_active', 0)->count();
    }
}
