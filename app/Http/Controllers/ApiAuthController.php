<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ApiAuthController extends Controller
{
    public function api_register (Request $request)
    {
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

        $token = $user->createToken('AuthToken')->plainTextToken;

        event(new Registered($user));
        Auth::login($user);

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function api_send_email_verification (EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response([
                'message' => 'Email already verified'
            ], 200);
        }

        $request->user()->sendEmailVerificationNotification();

        return response([
            'message' => 'Verification link sent'
        ], 200);
    }

    public function verify (EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response([
                'message' => 'Email already verified'
            ], 200);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return response([
            'message' => 'Email has been verified'
        ], 200);
    }
}
