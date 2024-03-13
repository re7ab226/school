<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {

            $usertype = Auth::user()->usertype;

            // Check the usertype
            if ($usertype == "1") {
                // If the usertype is "1" (admin), redirect to admin home page
                return view("admin.home");
            } else {
                // If the usertype is not "1" (admin), redirect to dashboard
                return view("dashboard");
            }

    }
}
