<?php

namespace App\Repositories;

use App\Models\ProductImage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductImageRepository
 * @package App\Repositories
 * @version October 11, 2018, 1:21 am MSK
 *
 * @method ProductImage findWithoutFail($id, $columns = ['*'])
 * @method ProductImage find($id, $columns = ['*'])
 * @method ProductImage first($columns = ['*'])
*/
class ProductImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'image',
        'alt',
        'ord',
        'carousels'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductImage::class;
    }
}
