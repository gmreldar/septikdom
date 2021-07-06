<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Documentation extends Model
{
    protected $table = 'documentation';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'text', 'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public static function getAll($type){
        return DB::table('documentation')->where('type', '=', $type)->pluck('title', 'id');
    }
}
