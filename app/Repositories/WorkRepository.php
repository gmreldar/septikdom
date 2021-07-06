<?php

namespace App\Repositories;

use App\Models\Work;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WorkRepository
 * @package App\Repositories
 * @version October 7, 2018, 7:21 pm MSK
 *
 * @method Work findWithoutFail($id, $columns = ['*'])
 * @method Work find($id, $columns = ['*'])
 * @method Work first($columns = ['*'])
*/
class WorkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'ord',
        'link',
        'image',
        'annotation',
        'text',
        'title',
        'description',
        'keywords',
        'is_active',
        'likes',
        'views'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Work::class;
    }
}
