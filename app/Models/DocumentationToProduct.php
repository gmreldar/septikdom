<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentationToProduct extends Model
{
    protected $table = 'documentation_to_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_documentation',
        'id_product'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
