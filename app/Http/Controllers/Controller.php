<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Businesses;
use App\Models\Industries;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index ()
    {
        $businesses = Businesses::orderBy('id', 'DESC')->take(8)->get();

        $page = 'home';
        return view('home')->with([
            'page' => $page,
            'businesses' => $businesses
        ]);
    }

    public function businesses ()
    {
        $page = 'businesses';
        $businesses = Businesses::all();
        $industries = Industries::all();
        return view('businesses')->with([
            'page' => $page,
            'businesses' => $businesses,
            'industries' => $industries
        ]);
    }

    public function business_details ($id)
    {
        $page = 'businesses';
        $business = Businesses::where('id', $id)->firstOrFail();
        $owner = $business->user;
        $skills = $owner->skills;
        $industry = Industries::where('id', $business->industry_id)->first()->industry;
        $other_businesses = Businesses::where('user_id', $owner->id)->get()->except($id);
//        dd($other_businesses);

        return view('business_details')->with([
            'page' => $page,
            'business' => $business,
            'owner' => $owner,
            'industry' => $industry,
            'skills' => $skills,
            'other_businesses' => $other_businesses
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

    public function sendMail (Request $request)
    {
        $contactData = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:30'],
                'last_name' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'message' => ['required', 'string']
            ]
        );

        if ($contactData) {
            Mail::send(new Contact($contactData));
            return back()->with('notice', 'Message sent successfully!');
        }

        return back();
    }

    public function search (Request $query)
    {
        $search_query = $query->search_query;

        $businesses = Businesses::where('business_name', 'LIKE', '%' . $search_query . '%')->get();
        $industries = Industries::all();

        $page = 'businesses';
        return view('businesses')->with([
            'page' => $page,
           'businesses' => $businesses,
            'query' => $search_query,
            'industries' => $industries
        ]);
    }

}
