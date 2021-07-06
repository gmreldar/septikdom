<?php

namespace App\Repositories;

use App\Models\Feedback;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FeedbackRepository
 * @package App\Repositories
 * @version October 10, 2018, 12:12 am MSK
 *
 * @method Feedback findWithoutFail($id, $columns = ['*'])
 * @method Feedback find($id, $columns = ['*'])
 * @method Feedback first($columns = ['*'])
*/
class FeedbackRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'email',
        'status',
        'text',
        'message'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Feedback::class;
    }
}
