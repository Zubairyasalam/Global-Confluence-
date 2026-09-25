<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationFee;
use App\Models\Deadline;

class FrontendController extends Controller
{
    public function index()
    {
        $registrationFees = RegistrationFee::where('is_active', true)->orderBy('sort_order')->get();
        $addons = \App\Models\Addon::where('is_active', true)->get();
        // $deadlines is now shared globally via AppServiceProvider

        return view('welcome', compact('registrationFees', 'addons'));
    }
}
