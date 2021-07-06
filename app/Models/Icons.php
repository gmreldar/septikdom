<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    protected $table = 'icons';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'sink', 'bath', 'toilet', 'washing', 'shower'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
