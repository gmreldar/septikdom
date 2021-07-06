<?php

namespace App\Models;

use App\Mail\NotificationMail;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

/**
 * Class Order
 * @package App\Models
 * @version October 10, 2018, 12:09 am MSK
 *
 * @property integer product_id
 * @property string name
 * @property string phone
 * @property integer status
 * @property string text
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];

    const STATUS = [
        0 => 'Новый',
        1 => 'В работе',
        2 => 'Выполнено'
    ];

    public $fillable = [
        'product_id',
        'name',
        'phone',
        'status',
        'text',
        'montazh',
        'user_agent',
        'user_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'status' => 'integer',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'status' => 'nullable|numeric',
        'text' => 'nullable|string'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $emails = Contact::first()->emails;
            if ($emails) {
                $emails = explode(',', $emails);
                foreach ($emails as $email) {
                    $message = PHP_EOL . 'Имя: ' . $model->name . PHP_EOL;
                    $message .= 'Телефон: ' . $model->phone . PHP_EOL;
                    Mail::to(trim($email))->send(new NotificationMail('Новый заказ! ' . $message));
                }
            }
        });
    }

    // Modification
    public function product(){
        return $this->belongsTo('App\Models\Modification', 'product_id');
    }

    public static function newsCount(){
        return self::where('status', 0)->count();
    }
}
