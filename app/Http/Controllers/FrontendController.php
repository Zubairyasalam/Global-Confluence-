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

    public function customPage($slug)
    {
        if ($slug === 'contact-us' || $slug === 'contact') {
            $settings = \App\Models\SiteSetting::where('group', 'contact')->pluck('value', 'key')->toArray();
            return view('contact', compact('settings'));
        }

        $formattedTitle = ucwords(str_replace('-', ' ', $slug));
        $content = \App\Models\SiteSetting::where('group', 'custom_pages')->where('key', 'page_' . $slug)->value('value');
        $bannerTitle = \App\Models\SiteSetting::where('group', 'custom_pages')->where('key', 'page_stall_banner_title')->value('value');
        $cardTitle = \App\Models\SiteSetting::where('group', 'custom_pages')->where('key', 'page_stall_card_title')->value('value');

        return view('custom_page', [
            'title' => ($slug === 'stall-booking-and-merchandise' && $bannerTitle) ? $bannerTitle : $formattedTitle,
            'cardTitle' => ($slug === 'stall-booking-and-merchandise' && $cardTitle) ? $cardTitle : $formattedTitle,
            'slug' => $slug,
            'content' => $content ?: 'Content for ' . $formattedTitle . ' will be updated soon. Please check back later!'
        ]);
    }
}

