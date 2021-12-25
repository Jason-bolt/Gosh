<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index ()
    {

        $user = Auth::user();

        $page = 'profile';
        return view('owners.profile_businesses')->with([
            'page' => $page,
            'user' => $user
        ]);
    }

    public function edit (Request $request)
    {
        $user = Auth::user();
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
}
