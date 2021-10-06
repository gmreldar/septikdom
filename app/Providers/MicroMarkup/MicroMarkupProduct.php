<?php
namespace App\Providers\MicroMarkup;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Spatie\SchemaOrg\BaseType;
use Spatie\SchemaOrg\Schema;
/**
 * @property BaseType $Markup
 * */
class MicroMarkupProduct implements IMicroMarkup
{
    private $Markup;
    public function __construct(Product $product, ProductCategory $category, LengthAwarePaginator $comments)
    {
        try{
            $this->PrepareResult($product, $category, $comments);
        }
        catch (\Exception $exception){
            $this->Markup = Schema::product();
            Log::alert(__CLASS__.":".__LINE__." ".$exception->getMessage());
        }
    }

    private function PrepareResult(Product $product, ProductCategory $category, LengthAwarePaginator $comments)
    {
        $comments_markup = array();
        foreach ($comments as $comment){
            $comments_markup[] = Schema::review()
                ->name("Отзыв")
                ->reviewRating(Schema::rating()->bestRating(5)->ratingValue(5)->worstRating(1))
                ->author($comment->name)
                ->description($comment->text)
                ->datePublished($comment->created_at->format('Y-m-d'));
        }
        $images_list = array();
        if(!empty($product->image)){
            $images_list = "/{$product->image}";
        }
        else{
            foreach ($product->images as $image){
                $images_list[] = "/{$image->image}";
            }
        }
        $this->Markup = Schema::product()
            ->aggregateRating(Schema::aggregateRating()->reviewCount(21)->ratingValue(5))
            ->name($product->name)
            ->image($images_list)
            ->brand([$category->name])
            ->review($comments_markup)
            ->offers(
                Schema::offer()->priceCurrency("руб")
                ->price($product->price())
                ->description($product->description)
            );
    }

    public function GetMarkup(): string
    {
        return $this->Markup->toScript();
    }
}