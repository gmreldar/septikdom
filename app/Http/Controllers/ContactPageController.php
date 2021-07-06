<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Text;

class ContactPageController extends Controller
{
    public function index()
    {
        $page = Page::find(8);
        $text = Text::find(6)->text;

        MainController::sessionIncrement($page);

        return view('pages.contacts', [
            'page' => $page,
            'text' => $text
        ]);
    }
}
