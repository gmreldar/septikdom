<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentationFile extends Model
{
    protected $table = 'documentation_files';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'old_name',
        'link'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
