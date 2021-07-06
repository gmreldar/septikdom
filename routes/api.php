<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/


//Route::resource('products', 'ProductAPIController');

//Route::resource('modifications', 'ModificationAPIController');

//Route::resource('product_categories', 'ProductCategoryAPIController');

//Route::resource('services', 'ServiceAPIController');

//Route::resource('articles', 'ArticleAPIController');

//Route::resource('article_categories', 'ArticleCategoryAPIController');



Route::resource('texts', 'TextAPIController');

Route::resource('pages', 'PageAPIController');

Route::resource('works', 'WorkAPIController');

Route::resource('comments', 'CommentAPIController');

Route::resource('orders', 'OrderAPIController');

Route::resource('feedback', 'FeedbackAPIController');

Route::resource('reviews', 'ReviewAPIController');

Route::resource('videos', 'VideoAPIController');

Route::resource('licenses', 'LicenseAPIController');

Route::resource('contacts', 'ContactAPIController');



Route::resource('product_images', 'ProductImageAPIController');