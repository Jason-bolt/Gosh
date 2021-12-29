<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd($request);
        if ($request->profile_image != null ) // Registering with profile picture
        {
            $request->validate([
                'fname' => ['required', 'string', 'max:50'],
                'lname' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'max:25'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'profile_image' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:5048'],
            ]);

            $profile_pic = time() . '-' . $request->fname . '.' .$request->profile_image->extension();
            $request->profile_image->move(public_path('images/owners'), $profile_pic);

            $user = User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $profile_pic,
                'password' => Hash::make($request->password),
            ]);
        }else{
//            Registering without profile picture
            $request->validate([
                'fname' => ['required', 'string', 'max:50'],
                'lname' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'max:25'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);


            $user = User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => 'null',
                'password' => Hash::make($request->password),
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('verification.notice'));
//        return redirect(RouteServiceProvider::HOME);
    }
}
