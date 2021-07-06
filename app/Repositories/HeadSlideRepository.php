<?php

namespace App\Repositories;

use App\Models\HeadSlide;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HeadSlideRepository
 * @package App\Repositories
 * @version April 18, 2019, 1:50 pm MSK
 *
 * @method HeadSlide findWithoutFail($id, $columns = ['*'])
 * @method HeadSlide find($id, $columns = ['*'])
 * @method HeadSlide first($columns = ['*'])
*/
class HeadSlideRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text1',
        'text2',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HeadSlide::class;
    }
}
