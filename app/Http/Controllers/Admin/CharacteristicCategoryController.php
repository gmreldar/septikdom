<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Models\CharacteristicCategory;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class СharacteristicCategoryController extends AppBaseController
{
    public function index(Request $request)
    {
        var_dump('test');
        return 'test';
        // return redirect(route('productCategories.show', CharacteristicCategory::SEPTICS_ID));
    }


}
