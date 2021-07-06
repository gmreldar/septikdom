<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentationFile;

class DownloadController extends Controller
{
    public function index($link)
    {
        $entry = DocumentationFile::where('link', '=', $link)->firstOrFail();
        $pathToFile = public_path('uploads/file/').$entry->name;
        return response()->download($pathToFile);
    }
}
