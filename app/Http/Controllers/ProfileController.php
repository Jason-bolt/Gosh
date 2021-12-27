<?php

namespace App\Http\Controllers;

use App\Models\Businesses;
use App\Models\Industries;
use App\Models\Skills;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index ()
    {

        $user = Auth::user();
        $id = Auth::id();

        $skills = Skills::where('user_id', $id)
            ->get();
        $industries = Industries::where('industry', '!=', 'all industries')
            ->get();

        $page = 'profile';
        return view('owners.profile_businesses')->with([
            'page' => $page,
            'user' => $user,
            'skills' => $skills,
            'industries' => $industries
        ]);
    }

    public function edit (Request $request)
    {

        $id = Auth::id();

        if ($request->profile_image == null)
        {
            $request->validate([
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'phone' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);

            User::where('id', $id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);
        }else{
//            With Profile picture
            $request->validate([
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'phone' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'profile_image' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:5048'],
            ]);

            $profile_pic = time() . '-' . $request->first_name . '.' .$request->profile_image->extension();
            $request->profile_image->move(public_path('images/owners'), $profile_pic);

            User::where('id', $id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'image' => $profile_pic,
                ]);
        }


        $page = 'profile';
        return back()->with('success', 'Profile edited successfully');
    }

    public function clear_image ()
    {
        $id = Auth::id();

        User::where('id', $id)
            ->update([
                'image' => 'null',
            ]);

        return back()->with('notice', 'Image cleared!');
    }

    public function add_skill (Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'skill' => ['required', 'string']
        ]);

//        dd($id);

        Skills::create([
            'user_id' => $id,
            'skill' => $request->skill,
        ]);

        return back()->with('success', 'Skill has been added.');
    }

    public function delete_skill ($id)
    {
        Skills::where('id', $id)
            ->delete();

        return back()->with('notice', 'Skill deleted.');
    }

    public function add_business (Request $request)
    {
        $id = Auth::id();
//        dd($request);
        $request->validate([
            'business_image' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:5048'],
            'business_name' => ['required', 'string', 'max:255'],
            'business_description' => ['required', 'string', 'max:1024'],
            'business_brief' => ['required', 'string', 'max:255'],
            'business_industry' => ['required', 'integer'],
            'business_location' => ['required', 'string', 'max:255']
        ]);

        $edited_business_name = str_replace(' ', '_', $request->business_name);
        $business_image_name = time() . '-' . $edited_business_name . '.' . $request->business_image->extension();
        $request->business_image->move(public_path('images/businesses'), $business_image_name);

        Businesses::create([
            'business_name' => $request->business_name,
            'industry_id' => $request->business_industry,
            'business_image' => $business_image_name,
            'business_location' => $request->business_location,
            'business_description' => $request->business_description,
            'user_id' => $id
        ]);

        return back()->with('success', 'Business created successfully.');

    }
}
