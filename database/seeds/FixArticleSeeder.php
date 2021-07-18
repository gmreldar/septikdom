<?php

use Illuminate\Database\Seeder;
use App\Models\Article;

class FixArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = '';
        $arrIds = [18,20,41,70,71,79,82,83,8488,108,112,131,133,134,135,136,137,138,139,140,141,142,143,144,145,146,14,148];
        if ($articles = Article::find($arrIds)) {
            foreach ($articles as $article) {
                $pattern = '/<a href="[^>]+">.+?<\/a>/';
                $url = '';
                preg_match($pattern, $article->text, $url, PREG_OFFSET_CAPTURE);
                $a = '';
            }
        }
        if ($products = \App\Models\Product::find([497,499,])) {

        }

        if ($productCategories = \App\Models\ProductCategory::find([51,56,64,70,80])) {

        }

        if ($services = \App\Models\Service::find([5,7,8])) {

        }

        if ($works = \App\Models\Work::find([1,2,4,5,15,16,18,20,21,22,23])) {

        }
    }
}
