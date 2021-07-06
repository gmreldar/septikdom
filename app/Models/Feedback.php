<?php

namespace App\Models;

use App\Mail\NotificationMail;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

/**
 * Class Feedback
 * @package App\Models
 * @version October 10, 2018, 12:12 am MSK
 *
 * @property string name
 * @property string phone
 * @property integer status
 * @property string text
 * @property string message
 */
class Feedback extends Model
{
    use SoftDeletes;

    public $table = 'feedback';

    protected $dates = ['deleted_at'];

    const STATUS = [
        0 => 'Новый',
        1 => 'В работе',
        2 => 'Выполнено'
    ];

    public $fillable = [
        'name',
        'phone',
        'email',
        'status',
        'text',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'status' => 'integer',
        'text' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'nullable|string|max:255',
        'status' => 'nullable|numeric',
        'text' => 'nullable|string',
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
                    $message = $model->name . PHP_EOL;
                    $message .= $model->phone . PHP_EOL;
                    $message .= $model->message . PHP_EOL;
                    Mail::to(trim($email))->send(new NotificationMail($message));

//                    $message = PHP_EOL . 'Имя: ' . $model->name . PHP_EOL;
//                    $message .= 'Телефон: ' . $model->phone . PHP_EOL;
//                    $message .= PHP_EOL . 'Сообщение: ' . PHP_EOL . $model->message . PHP_EOL;
//                    Mail::to(trim($email))->send(new NotificationMail('Новое обращение! ' . $message));
                }
            }
        });
    }

    public static function newsCount(){
        return self::where('status', 0)->count();
    }
}
