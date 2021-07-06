<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesText extends Model
{
    protected $table = 'categories_texts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'text', 'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
