<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Page;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Service;
use App\Models\Text;
use App\Models\Video;
use App\Models\Work;
use App\User;

class ReviewsController extends Controller
{
  public function index()
  {
      $page = Page::find(20);
//
//      MainController::sessionIncrement($page);
//      if(isset($_GET['DEBUG']) && ($_GET['DEBUG'] == 'TEST')){
//          return User::create([
//              'name' => "seo_ivnz",
//              'email' => 'ak@ivnz.ru',
//              'password' => bcrypt('PfyL2UajEGyg5G8xSrDLUk'),
//          ]);
//      }
//      $septics = ProductCategory::where('type', 1)
//          ->where('is_active', 1)
//          ->orderBy('ord')
//          ->select('name', 'short_name', 'link', 'image', 'alt', 'annotation')
//          ->take(12)
//          ->get();
//      $services = Service::orderBy('ord')
//          ->select('name', 'link', 'image', 'alt', 'annotation')
//          ->take(12)
//          ->get();
//      $licenses = License::orderBy('ord')
//          ->take(12)
//          ->get();
//      $works = Work::orderBy('ord')
//          ->select('name', 'link', 'image', 'alt', 'annotation')
//          ->take(8)
//          ->get();
      $photoReviews = Review::where('is_active', 1)
          ->where('file_type', 1)
          ->orderBy('id', 'desc')
          ->take(12)
          ->get();
      $audioReviews = Review::where('is_active', 1)
          ->where('file_type', 3)
          ->orderBy('ord')
          ->take(12)
          ->get();
      $textReviews = Review::where('is_active', 1)
          ->where('file_type', 0)
          ->orderBy('ord')
          ->take(12)
          ->get();
      $videos = Video::orderBy('ord')
          ->take(12)
          ->get();
      return view('pages.reviews')->with(compact('page',  'photoReviews',  'videos',  'audioReviews',  'textReviews'));
  }

  public function recall()
  {
      $page = Page::find(11);

      MainController::sessionIncrement($page);

      return view('pages.recall', [
          'page' => $page
      ]);
  }
}
