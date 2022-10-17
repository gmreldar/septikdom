<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Text;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $page = Page::find(21);


        return view('pages.privacy_policy', [
            'page' => $page,
        ]);
    }
}