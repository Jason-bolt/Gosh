<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index ()
    {
        $page = 'home';
        return view('home')->with([
            'page' => $page
        ]);
    }

    public function businesses ()
    {
        $page = 'businesses';
        return view('businesses')->with([
            'page' => $page
        ]);
    }

    public function business_details ($id)
    {
        $page = 'businesses';
        return view('business_details')->with([
            'page' => $page
        ]);
    }

    public function contact ()
    {
        $page = 'contact';
        return view('contact')->with([
            'page' => $page
        ]);
    }

    public function faqs ()
    {
        $page = 'faq';
        return view('faqs')->with([
            'page' => $page
        ]);
    }

    public function terms ()
    {
        $page = 'terms';
        return view('terms')->with([
            'page' => $page
        ]);
    }
}
