<?php

namespace App\Repositories;

use App\Models\License;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LicenseRepository
 * @package App\Repositories
 * @version October 10, 2018, 12:20 am MSK
 *
 * @method License findWithoutFail($id, $columns = ['*'])
 * @method License find($id, $columns = ['*'])
 * @method License first($columns = ['*'])
*/
class LicenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'alt',
        'ord'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return License::class;
    }
}
