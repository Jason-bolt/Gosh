<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index () {
        $page = 'profile';
        return view('owners.profile_businesses')->with([
            'page' => $page
        ]);
    }
}
