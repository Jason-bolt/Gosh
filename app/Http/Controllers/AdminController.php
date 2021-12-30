<?php

namespace App\Http\Controllers;

use App\Models\Businesses;
use App\Models\Industries;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pending()
    {
        $page = 'pending';
        $businesses = Businesses::where('accepted', '!=', 2)->get();
        $industries = Industries::all();
        return view('businesses')->with([
            'page' => $page,
            'businesses' => $businesses,
            'industries' => $industries
        ]);
    }

    public function approved()
    {
        $page = 'approved';
        $businesses = Businesses::where('accepted', 2)->get();
        $industries = Industries::all();
        return view('businesses')->with([
            'page' => $page,
            'businesses' => $businesses,
            'industries' => $industries
        ]);
    }

    public function approve_business($id)
    {
//        dd($id);
        Businesses::where('id', $id)
            ->update([
                'accepted' => 2
            ]);

        return back()->with('notice', 'Business approved.');
    }

    public function decline_business($id)
    {
//        dd($id);
        Businesses::where('id', $id)
            ->update([
                'accepted' => 1
            ]);

        return back()->with('notice', 'Business declined.');
    }
}
