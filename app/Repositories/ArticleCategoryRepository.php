<?php

namespace App\Repositories;

use App\Models\ArticleCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ArticleCategoryRepository
 * @package App\Repositories
 * @version October 6, 2018, 1:49 am MSK
 *
 * @method ArticleCategory findWithoutFail($id, $columns = ['*'])
 * @method ArticleCategory find($id, $columns = ['*'])
 * @method ArticleCategory first($columns = ['*'])
*/
class ArticleCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'link',
        'ord',
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
        return ArticleCategory::class;
    }
}
