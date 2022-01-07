<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Businesses;
use App\Models\Industries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    public function api_businesses()
    {
        return Businesses::where('accepted', 2)->get();
    }

    public function api_industry_businesses (Request $request)
    {
        $industry_id = $request->industry_id;
        if ($industry_id == 1)
        {
            $businesses = Businesses::all();
        }else{
            $businesses = Businesses::where('industry_id', $industry_id)->get();
        }
        $selected_industry = Industries::where('id', $industry_id)->firstOrFail();
        return response([
            'status' => 200,
            'selected_industry' => $selected_industry,
            'buinesses' => $businesses,
        ]);
    }

    public function api_business_details ($id)
    {
        $business = Businesses::where([
            ['id', $id],
            ['accepted', 2]
        ])->firstOrFail();
        $owner = $business->user;
        $skills = $owner->skills;
        $industry = Industries::where('id', $business->industry_id)->first()->industry;
        $other_businesses = Businesses::where('user_id', $owner->id)->get()->except($id);

        return response([
            'status' => 200,
            'business' => $business,
            'owner' => $owner,
            'industry' => $industry,
            'skills' => $skills,
            'other_businesses' => $other_businesses
        ]);
    }

    public function api_sendMail (Request $request)
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
            return response([
                'status' => 200,
                'message' => 'Message sent successfully!'
            ]);
        }

        return response([
            'message' => 'Message could not be sent'
        ]);
    }
}
