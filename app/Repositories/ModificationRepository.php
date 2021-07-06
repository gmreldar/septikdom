<?php

namespace App\Repositories;

use App\Models\Modification;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModificationRepository
 * @package App\Repositories
 * @version September 26, 2018, 3:31 pm MSK
 *
 * @method Modification findWithoutFail($id, $columns = ['*'])
 * @method Modification find($id, $columns = ['*'])
 * @method Modification first($columns = ['*'])
*/
class ModificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'price',
        'datePublic',
        'annotation',
        'image',
        'sale',
        'lastmod',
        'volume',
        'destination',
        'modtitle',
        'proizvoditelnost',
        'glubina',
        'gabarit',
        'power',
        'massa',
        'chel',
        'topasid',
        'evroid',
        'oldprice',
        'sort_main',
        'ueprice',
        'ueid',
        'showcalc',
        'topassid',
        'discount',
        'useful_volume',
        'weight',
        'entry',
        'equipment',
        'extended_neck',
        'fasteners'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Modification::class;
    }
}
