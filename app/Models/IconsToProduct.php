<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IconsToProduct extends Model
{
    protected $table = 'icons_to_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_icons',
        'id_product'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
