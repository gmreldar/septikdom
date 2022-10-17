<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

removeUrlDoubleSlash();
removeUrlDoubleSlash('https');

Route::get('clear', function () {
    Log::debug('CLEARED');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
});

Route::get('/', 'HomePageController@index')->name('index');
Route::get('/o-nas', 'AboutPageController@index')->name('about');
Route::get('/faq', 'FAQPageController@index')->name('faq');

Route::get('/sitemap', 'MainController@sitemap')->name('sitemap');

Route::get('/uslugi', 'ServicesController@index')->name('services');
Route::get('/uslugi/{link}', 'ServicesController@show')->name('services.item');

Route::get('/download/{link}', 'DownloadController@index');

Route::get('/katalog', 'ProductsController@index')->name('catalog');
//Route::get('/katalog/septics', 'ProductsController@septics');
Route::get('/katalog/cellars', 'ProductsController@cellars')->name('catalog.cellars');
Route::get('/katalog/caissons', 'ProductsController@caissons')->name('catalog.caissons');
Route::get('/katalog/{categoryLink}', 'ProductsController@category')->name('catalog.category');
Route::get('/katalog/{categoryLink}/{link}', 'ProductsController@product')->name('catalog.product');
Route::post('/katalog', ['uses' => 'ProductsController@getModification']);
Route::post('/katalog/order', ['uses' => 'ProductsController@order']);
Route::post('/katalog/comment', ['uses' => 'ProductsController@comment']);
Route::post('/katalog/readMore', 'ProductsController@readMore');

Route::get('/prays-list', 'PriceListPageController@index')->name('price');
Route::get('/prays-list/{type}', 'PriceListPageController@category')->name('price.category');

Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{categoryLink}', 'BlogController@category')->name('blog.category');
Route::get('/blog/{categoryLink}/{link}', 'BlogController@article')->name('blog.article');
Route::post('/blogSearch', ['uses' => 'BlogController@search']); // need 'words' for search

Route::post('/search', ['uses' => 'SearchController@search']); // need 'words' for search

Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');
Route::get('/portfolio/{link}', 'PortfolioController@show')->name('portfolio.item');

Route::get('/kontakty', 'ContactPageController@index')->name('contacts');
Route::get('/spasibo', 'SpasiboPageController@index')->name('spasibo');
Route::get('/recall', 'SpasiboPageController@recall')->name('recall');

Route::get('/calculator', 'CalculatorController@index')->name('calculator');

Route::post('/feedback', ['uses' => 'MainController@feedback']);
Route::post('/review', ['uses' => 'MainController@review']);
Route::post('/calculator', ['uses' => 'CalculatorController@searchModification'])->name('katalog.calculator');

Route::get('/shipping', 'MainController@shipping')->name('shipping');

Route::get('/view/reviews', 'ReviewsController@index')->name('pages.reviews');

Route::get('/view/map', 'MapController@index')->name('pages.map');

//
//Route::get('/{categoryHref}/{href}', ['uses' => 'PagesController@article'])->where('categoryHref', '(?:(?!admin).)*');
//

//
//// ------------------------------------- //
//
//Route::post('/upload_image', ['uses' => 'StorageController@uploadImage']);
//Route::post('/savePhoto', ['uses' => 'StorageController@savePhoto']);


Auth::routes();
Route::view('/registered', 'auth.success')->name('registered');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'Admin\HomeController@index');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('modifications', 'Admin\ModificationController');
    Route::resource('productCategories', 'Admin\ProductCategoryController');
    Route::resource('categoriesText', 'Admin\CategoriesTextController');
    Route::resource('сharacteristicCategories', 'Admin\СharacteristicCategoryController');
    Route::resource('services', 'Admin\ServiceController');

    Route::resource('documentation', 'Admin\DocumentationController');
    Route::resource('new_icons', 'Admin\NewIconsController');
//    Route::get('documentation', 'Admin\DocumentationController@index');

    Route::resource('articles', 'Admin\ArticleController');
    Route::resource('articleCategories', 'Admin\ArticleCategoryController');
    Route::resource('texts', 'Admin\TextController', ['only' => [
        'index', 'update', 'edit', 'create', 'store'
    ]]);
    Route::resource('pages', 'Admin\PageController', ['only' => [
        'index', 'update', 'edit'
    ]]);

    Route::get('pages/bestsellers', 'Admin\PageController@bestsellers')->name('pages.bestsellers');
    Route::post('pages/bestsellers/save', 'Admin\PageController@bestsellers_save')->name('pages.bestsellers.save');

    Route::get('pages/bestsellers/delete', 'Admin\PageController@bestsellers_destroy')->name('pages.bestsellers.destroy');

    Route::resource('works', 'Admin\WorkController');
    Route::resource('comments', 'Admin\CommentController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('afeedback', 'Admin\FeedbackController');
    Route::resource('reviews', 'Admin\ReviewController');
    Route::resource('videos', 'Admin\VideoController');
    Route::resource('licenses', 'Admin\LicenseController');
    Route::resource('productImages', 'Admin\ProductImageController', ['only' => [
        'store', 'destroy'
    ]]);
    Route::resource('contacts', 'Admin\ContactController', ['only' => [
        'update', 'edit'
    ]]);
    Route::post('/update/order', 'MainController@updateOrder')->name('update.order');
    Route::post('/update/value', 'MainController@updateValue')->name('update.value');
    Route::post('/update-documentation', 'Admin\DocumentationController@update');
    Route::post('/update-categoriesText', 'Admin\CategoriesTextController@update');
    Route::post('/update-icons', 'Admin\IconsController@update');

    Route::resource('headSlides', 'Admin\HeadSlideController');
    Route::resource('logoSlides', 'Admin\LogoSlideController');
    Route::resource('questions', 'Admin\QuestionController');
    Route::get('generate_sitemap', 'Admin\AppBaseController@sitemap_xml_generator')->name('sitemap_xml_generator');

    Route::get('/admin/map', 'Admin\MapController@index')->name('admin.map');
    Route::get('/admin/map/create', 'Admin\MapController@create')->name('admin.map.create');
    Route::get('/admin/map/{id}/edit', 'Admin\MapController@edit')->name('admin.map.edit');
    Route::patch('/admin/map/{id}/update', 'Admin\MapController@update')->name('admin.map.update');
    Route::delete('/admin/map/{id}/destroy', 'Admin\MapController@destroy')->name('admin.map.destroy');
    Route::post('/admin/map/store', 'Admin\MapController@store')->name('admin.map.store');

});

Route::post('/uploadImage', ['uses' => 'StorageController@uploadImage']);

Route::get('/privacy-policy', 'PrivacyPolicyController@index')->name('privacy.policy');
