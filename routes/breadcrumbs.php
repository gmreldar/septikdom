<?php
#single pages
Breadcrumbs::register('single.first_page', function ($breadcrumbs, $page_name, $page_route=null) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push($page_name, $page_route);
});
Breadcrumbs::register('double.second_page', function ($breadcrumbs, $first_page, $second_page) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push($first_page["name"], $first_page["url"]);
    $breadcrumbs->push($second_page["name"], $second_page["url"]);
});

#catalog
Breadcrumbs::register('catalog.category', function ($breadcrumbs, $category) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push('Каталог', route('catalog'));
    $breadcrumbs->push($category->name, route("catalog.category",$category->link));
});
Breadcrumbs::register('catalog.product', function ($breadcrumbs, $category, $product) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push('Каталог', route('catalog'));
    $breadcrumbs->push($category->name, route("catalog.category",$category->link));
    $breadcrumbs->push($product->name, route("catalog.product",[$category->link, $product->link]));
});

#services
Breadcrumbs::register('services.service', function ($breadcrumbs, $service) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push('Услуги', route('services'));
    $breadcrumbs->push($service->name, route('services.item', $service->link));
});

#portfolio
Breadcrumbs::register('portfolio.project', function ($breadcrumbs, $project) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push('Портфолио', route('portfolio'));
    $breadcrumbs->push($project->name, route("portfolio.item", $project->link));
});

#blog
Breadcrumbs::register('blog.category', function ($breadcrumbs, $category) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push('Блог', route('blog'));
    $breadcrumbs->push($category->name, route('blog.category', $category->link));
});
Breadcrumbs::register('blog.article', function ($breadcrumbs, $category, $article) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push('Блог', route('blog'));
    $breadcrumbs->push($category->name, route("blog.category",$category->link));
    $breadcrumbs->push($article->name, route("blog.article", [$category->link, $article->link]));
});


#price
Breadcrumbs::register('price.category', function ($breadcrumbs, $price_category) {
    $breadcrumbs->push('Главная', route('index'));
    $breadcrumbs->push("Прайс-лист", route("price"));
    $breadcrumbs->push(\App\Models\ProductCategory::TYPE[$price_category], route("price.category", $price_category));
});