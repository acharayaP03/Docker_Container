<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        # code...
        $title = 'Demo app with Laravel & Docker.';
        return view('pages.welcome')->with('title', $title);
    }

    public function about()
    {
        # code...
        $title = 'About';
        return view('pages.about')->with('title', $title);
    }

    public function services()  
    {
        # code...
        $data = array(
            'title' => 'Services',
            'services' => ['Web Designgn', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
