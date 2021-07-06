<?php

namespace App\Repositories;

use App\Models\LogoSlide;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LogoSlideRepository
 * @package App\Repositories
 * @version April 18, 2019, 1:57 pm MSK
 *
 * @method LogoSlide findWithoutFail($id, $columns = ['*'])
 * @method LogoSlide find($id, $columns = ['*'])
 * @method LogoSlide first($columns = ['*'])
*/
class LogoSlideRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'alt',
        'url',
        'ord'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LogoSlide::class;
    }
}
