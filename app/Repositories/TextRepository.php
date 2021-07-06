<?php

namespace App\Repositories;

use App\Models\Text;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TextRepository
 * @package App\Repositories
 * @version October 7, 2018, 7:06 pm MSK
 *
 * @method Text findWithoutFail($id, $columns = ['*'])
 * @method Text find($id, $columns = ['*'])
 * @method Text first($columns = ['*'])
*/
class TextRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'text',
        'page_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Text::class;
    }
}
