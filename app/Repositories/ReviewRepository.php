<?php

namespace App\Repositories;

use App\Models\Review;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReviewRepository
 * @package App\Repositories
 * @version October 10, 2018, 12:16 am MSK
 *
 * @method Review findWithoutFail($id, $columns = ['*'])
 * @method Review find($id, $columns = ['*'])
 * @method Review first($columns = ['*'])
*/
class ReviewRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'city',
        'message',
        'file',
        'file_type',
        'alt',
        'is_active',
        'ord'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Review::class;
    }
}
