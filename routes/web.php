<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaperSubmissionController;
use App\Http\Controllers\RegistrationController;

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/setup-db', function () {
    try {
        // Force Laravel to clear the cache and read the new .env file
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        
        $pdo = new PDO("mysql:host=127.0.0.1;port=3306", "root", "");
        $pdo->exec("CREATE DATABASE IF NOT EXISTS biomed_app");
        
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true]);
        
        // Optionally delete the sqlite file so it doesn't cause confusion
        if (file_exists(database_path('database.sqlite'))) {
            @unlink(database_path('database.sqlite'));
        }
        
        return "Cache cleared, MySQL database created, and migrations run successfully!<br><br>Output:<br>" . nl2br(\Illuminate\Support\Facades\Artisan::output());
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/run-migration', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate');
        return "Migration run successfully!<br>Output:<br>" . nl2br(\Illuminate\Support\Facades\Artisan::output());
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/seed-tracks', function () {
    $tracks = [
        [
            'title' => 'Track I: Emerging infectious diseases through a One health lens',
            'bullet_points' => ['Zoonosis', 'Vector borne diseases', 'Next generation pandemic preparedness', 'Environmental Reservoirs and AMR', 'Molecular Therapeutics and countermeasure innovations', 'Metagenomics in the wild', 'Novel antimicrobials']
        ],
        [
            'title' => 'Track II: Strengthening Health Systems from Theory to Practice: Embedding Social Infrastructure and Public Governance in One Health Capacities',
            'bullet_points' => ['Institutional Governance & Multi-Sectoral Policy', 'Public health policy and One Health governance', 'Social Infrastructure & Community Resilience', 'Workforce Development & Operational Capacity', 'Addressing Social Determinants of Health', 'Crisis and outbreak management', 'Community-led health equity']
        ],
        [
            'title' => 'Track III: Integrating Environment and Climate change in One Health',
            'bullet_points' => ['Climate Change and Pathogen Dynamics', 'Biodiversity conservation and Biosecurity', 'Ecosystem resilience', 'Climate change and Environmental health', 'Waste management and circular bioeconomy', 'Mitigating Pollution', 'Sustainable production systems']
        ],
        [
            'title' => 'Track IV: Translating Sustainable Chemistry and Future Technologies to One Health',
            'bullet_points' => ['Green Chemistry & Eco-Safe Material Design', 'Advanced Technologies for Environmental and Pathogen Remediation', 'Translational Innovation & Regulatory Harmonization', 'One Health and chemical challenges', 'Emerging contaminants and environmental chemistry', 'Sustainable solutions for environmental challenges']
        ],
        [
            'title' => 'Track V: Ensuring health intervention through the Indian Knowledge System',
            'bullet_points' => ['Traditional Healthcare Systems', 'Ethnomedicine and Community Health Practices', 'Medicinal Plants and Natural Product Research', 'Traditional Food Systems, Nutrition and Functional Foods', 'Biodiversity Conservation and Indigenous Ecological Knowledge', 'Validation of Traditional Knowledge through Modern Science', 'Integrative Medicine and Precision Traditional Therapeutics', 'One Health Perspectives in Indian Knowledge Systems', 'Digital Documentation and Preservation of Indigenous Knowledge', 'Policy, Ethics and Intellectual Property Rights in Traditional Knowledge', 'AI and Omics Approaches for Traditional Medicine Research', 'Translational Research and Commercialization of IKS-based Innovations']
        ],
        [
            'title' => 'Track VI: Regenerative Health: Redefining Industrial One Health Paradigms',
            'bullet_points' => ['Responsible Pharmaceutical Manufacturing', 'Next-Generation Veterinary Biologics', 'Green Agrochemicals & Biopesticides', 'Corporate Stewardship & Supply Chain Resilience', 'Venture Capital in Planetary Health', 'Cross-Sectoral Commercial Collaboration', 'Integrating comprehensive One Health metrics into Environmental, Social, and Governance (ESG) corporate reporting standards']
        ]
    ];
    
    \App\Models\Track::truncate();
    foreach($tracks as $index => $trackData) {
        \App\Models\Track::create([
            'title' => $trackData['title'],
            'bullet_points' => $trackData['bullet_points'],
            'sort_order' => $index + 1
        ]);
    }
    return "Default tracks have been seeded! You can now visit the /scientific-themes page or the admin CMS to view them.";
});

//     return view('submit-paper');
// })->name('submit-paper');

Route::get('/registration', function () {
    $registrationFees = \App\Models\RegistrationFee::where('is_active', true)->orderBy('sort_order')->get();
    $addons = \App\Models\Addon::where('is_active', true)->get();
    $policies = \App\Models\Policy::where('is_active', true)->orderBy('sort_order')->get();
    return view('registration', compact('registrationFees', 'addons', 'policies'));
})->name('registration');

Route::get('/speakers', function () {
    $keynote = \App\Models\Speaker::where('type', 'keynote')->orderBy('sort_order')->get();
    $distinguished = \App\Models\Speaker::where('type', 'distinguished')->orderBy('sort_order')->get();
    return view('speakers', compact('keynote', 'distinguished'));
})->name('speakers');

Route::get('/keynote-speakers', function () {
    $speakers = \App\Models\Speaker::where('type', 'keynote')->orderBy('sort_order')->get();
    return view('keynote-speakers', compact('speakers'));
})->name('keynote-speakers');

Route::get('/distinguished-speakers', function () {
    $speakers = \App\Models\Speaker::where('type', 'distinguished')->orderBy('sort_order')->get();
    return view('distinguished-speakers', compact('speakers'));
})->name('distinguished-speakers');

Route::get('/committee', function () {
    $leadership = \App\Models\CommitteeMember::where('category', 'leadership')->orderBy('sort_order')->get()->groupBy('subcategory');
    $organizing = \App\Models\CommitteeMember::where('category', 'organizing_committee')->orderBy('sort_order')->get();
    $advisory = \App\Models\CommitteeMember::where('category', 'advisory_committee')->orderBy('sort_order')->get();
    $settings = \App\Models\SiteSetting::where('group', 'committee_page')->pluck('value', 'key')->toArray();
    return view('committee', compact('leadership', 'organizing', 'advisory', 'settings'));
})->name('committee');

Route::get('/venue', function () {
    return view('venue');
})->name('venue');

Route::get('/about-organizer', function () {
    return view('about-organizer');
})->name('about-organizer');

Route::get('/topics', function () {
    return view('topics-page');
})->name('topics');

Route::get('/scientific-themes', function () {
    $tracks = \App\Models\Track::orderBy('sort_order')->get();
    return view('scientific-themes', compact('tracks'));
})->name('scientific-themes');

Route::get('/guidelines', function () {
    return view('guidelines');
})->name('guidelines');

Route::get('/sponsors', function () {
    return view('sponsors');
})->name('sponsors');

Route::get('/awards', function () {
    return view('awards');
})->name('awards');

Route::get('/key-dates', function () {
    $deadlines = \App\Models\Deadline::where('is_active', true)->orderBy('sort_order')->get();
    return view('key-dates', compact('deadlines'));
})->name('key-dates');

Route::get('/venue', function () {
    $settings = \App\Models\SiteSetting::where('group', 'venue')->pluck('value', 'key');
    return view('venue', compact('settings'));
})->name('venue');

Route::get('/schedule', function () {
    return view('schedule');
})->name('schedule');
Route::post('/api/submit-paper', [PaperSubmissionController::class, 'store'])->name('api.submit_paper');
Route::post('/api/register', [RegistrationController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/registrations', [AdminController::class, 'registrations'])->name('admin.registrations');
    Route::delete('/registrations/{id}', [AdminController::class, 'deleteRegistration'])->name('admin.registrations.destroy');
    Route::get('/submissions', [AdminController::class, 'submissions'])->name('admin.submissions');
    Route::delete('/submissions/{id}', [AdminController::class, 'deleteSubmission'])->name('admin.submissions.destroy');
    
    // CMS: Registration Fees
    Route::get('/fees', [AdminController::class, 'fees'])->name('admin.fees');
    Route::post('/fees', [AdminController::class, 'storeFee'])->name('admin.fees.store');
    Route::put('/fees/{id}', [AdminController::class, 'updateFee'])->name('admin.fees.update');
    Route::delete('/fees/{id}', [AdminController::class, 'deleteFee'])->name('admin.fees.delete');

    Route::post('/addons', [AdminController::class, 'storeAddon'])->name('admin.addons.store');
    Route::put('/addons/{id}', [AdminController::class, 'updateAddon'])->name('admin.addons.update');
    Route::delete('/addons/{id}', [AdminController::class, 'deleteAddon'])->name('admin.addons.delete');


    // CMS: Global Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    // NEW STRUCTURE:
    
    // 1. Home
    Route::get('/home', [AdminController::class, 'homeSettings'])->name('admin.home');
    Route::post('/home', [AdminController::class, 'updateHomeSettings'])->name('admin.home.update');
    
    // Sub-sections under home that were previously top-level
    Route::get('/home/hero', [AdminController::class, 'heroSettings'])->name('admin.hero');
    Route::post('/home/hero', [AdminController::class, 'updateSettings'])->name('admin.hero.update');
    Route::post('/home/hero/organizers', [AdminController::class, 'storeHeroOrganizer'])->name('admin.hero.organizers.store');
    Route::put('/home/hero/organizers/{id}', [AdminController::class, 'updateHeroOrganizer'])->name('admin.hero.organizers.update');
    Route::delete('/home/hero/organizers/{id}', [AdminController::class, 'destroyHeroOrganizer'])->name('admin.hero.organizers.destroy');
    Route::post('/home/hero/organizers/reorder', [AdminController::class, 'reorderHeroOrganizers'])->name('admin.hero.organizers.reorder');
    Route::get('/home/about', [AdminController::class, 'aboutSettings'])->name('admin.about');
    Route::post('/home/about', [AdminController::class, 'updateSettings'])->name('admin.about.update');
    Route::get('/home/objectives', [AdminController::class, 'objectivesSettings'])->name('admin.objectives');
    Route::post('/home/objectives', [AdminController::class, 'updateObjectivesSettings'])->name('admin.objectives.update');
    Route::get('/home/highlights', [AdminController::class, 'highlights'])->name('admin.highlights');
    Route::post('/home/highlights/settings', [AdminController::class, 'updateHighlightsSettings'])->name('admin.highlights.update_settings');
    Route::post('/home/highlights', [AdminController::class, 'storeHighlight'])->name('admin.highlights.store');
    Route::put('/home/highlights/{id}', [AdminController::class, 'updateHighlight'])->name('admin.highlights.update');
    Route::delete('/home/highlights/{id}', [AdminController::class, 'destroyHighlight'])->name('admin.highlights.destroy');
    Route::get('/home/guidelines', [AdminController::class, 'guidelinesSettings'])->name('admin.guidelines');
    Route::post('/home/guidelines', [AdminController::class, 'updateGuidelinesSettings'])->name('admin.guidelines.update');
    Route::get('/home/event-details', [AdminController::class, 'eventDetails'])->name('admin.event_details');
    Route::post('/home/event-details', [AdminController::class, 'updateEventDetails'])->name('admin.event_details.update');
    Route::post('/home/event-details/deadlines', [AdminController::class, 'storeDeadline'])->name('admin.deadlines.store');
    Route::put('/home/event-details/deadlines/{id}', [AdminController::class, 'updateDeadline'])->name('admin.deadlines.update');
    Route::delete('/home/event-details/deadlines/{id}', [AdminController::class, 'deleteDeadline'])->name('admin.deadlines.delete');

    // 2. Committee (Already exists, just keep it clean)
    Route::get('/committee', [AdminController::class, 'committee'])->name('admin.committee');
    Route::post('/committee/settings', [AdminController::class, 'updateCommitteeSettings'])->name('admin.committee.settings.update');
    Route::post('/committee', [AdminController::class, 'storeCommitteeMember'])->name('admin.committee.store');
    Route::put('/committee/{id}', [AdminController::class, 'updateCommitteeMember'])->name('admin.committee.update');
    Route::delete('/committee/{id}', [AdminController::class, 'destroyCommitteeMember'])->name('admin.committee.destroy');

    // 3. Experts (Renamed from Speakers)
    Route::get('/experts', [AdminController::class, 'speakers'])->name('admin.experts');
    Route::post('/experts', [AdminController::class, 'storeSpeaker'])->name('admin.speakers.store');
    Route::put('/experts/{id}', [AdminController::class, 'updateSpeaker'])->name('admin.speakers.update');
    Route::delete('/experts/{id}', [AdminController::class, 'destroySpeaker'])->name('admin.speakers.destroy');

    // 4. Tracks (Renamed from Scientific Themes / Programs)
    Route::get('/tracks', [AdminController::class, 'programsSettings'])->name('admin.tracks');
    Route::post('/tracks/settings', [AdminController::class, 'updateProgramsSettings'])->name('admin.programs.update');
    Route::post('/tracks', [AdminController::class, 'storeTrack'])->name('admin.tracks.store');
    Route::put('/tracks/{id}', [AdminController::class, 'updateTrack'])->name('admin.tracks.update');
    Route::delete('/tracks/{id}', [AdminController::class, 'destroyTrack'])->name('admin.tracks.destroy');

    // 5. Schedule
    Route::get('/schedule', [AdminController::class, 'scheduleSettings'])->name('admin.schedule');
    Route::post('/schedule', [AdminController::class, 'updateScheduleSettings'])->name('admin.schedule.update');

    // 6. Awards
    Route::get('/awards', [AdminController::class, 'awards'])->name('admin.awards');
    Route::post('/awards/settings', [AdminController::class, 'updateAwardsSettings'])->name('admin.awards.settings.update');
    Route::post('/awards', [AdminController::class, 'storeAward'])->name('admin.awards.store');
    Route::put('/awards/{id}', [AdminController::class, 'updateAward'])->name('admin.awards.update');
    Route::delete('/awards/{id}', [AdminController::class, 'destroyAward'])->name('admin.awards.destroy');

    // 7. Pre-Conference
    Route::get('/pre-conference', [AdminController::class, 'preConferenceSettings'])->name('admin.pre_conference');
    Route::post('/pre-conference', [AdminController::class, 'updatePreConferenceSettings'])->name('admin.pre_conference.update');

    // 8. MCC Memorial
    Route::get('/mcc-memorial', [AdminController::class, 'mccMemorialSettings'])->name('admin.mcc_memorial');
    Route::post('/mcc-memorial', [AdminController::class, 'updateMccMemorialSettings'])->name('admin.mcc_memorial.update');

    // 9. Visit (Renamed from Venue)
    Route::get('/visit', [AdminController::class, 'venueSettings'])->name('admin.visit');
    Route::post('/visit', [AdminController::class, 'updateVenueSettings'])->name('admin.venue.update');

    // 10. Theme Settings
    Route::get('/theme-settings', [AdminController::class, 'themeSettings'])->name('admin.theme_settings');
    Route::post('/theme-settings', [AdminController::class, 'updateThemeSettings'])->name('admin.theme_settings.update');


    // LEGACY BUT NEEDED FOR NOW:
    Route::get('/settings/registration', [AdminController::class, 'registrationSettings'])->name('admin.settings.registration');
    Route::post('/settings/registration', [AdminController::class, 'updateRegistrationSettings'])->name('admin.settings.registration.update');
    Route::get('/about-organizer', [AdminController::class, 'aboutOrganizerSettings'])->name('admin.about_organizer');
    Route::post('/about-organizer', [AdminController::class, 'updateSettings'])->name('admin.about_organizer.update');
});

// Award Application Routes
Route::get('/downloads/proforma', function () {
    $headers = [
        "Content-type"        => "application/msword",
        "Content-Disposition" => "attachment;Filename=Proforma_For_Nomination.doc",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];
    return response()->view('downloads.proforma')->withHeaders($headers);
})->name('download.proforma');

Route::get('/downloads/proforma-scholar', function () {
    $headers = [
        "Content-type"        => "application/msword",
        "Content-Disposition" => "attachment;Filename=Proforma_For_Scholar_Award.doc",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];
    return response()->view('downloads.proforma_scholar')->withHeaders($headers);
})->name('download.proforma_scholar');

Route::get('/downloads/proforma-innovator', function () {
    $headers = [
        "Content-type"        => "application/msword",
        "Content-Disposition" => "attachment;Filename=Proforma_For_Innovator_Award.doc",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];
    return response()->view('downloads.proforma_innovator')->withHeaders($headers);
})->name('download.proforma_innovator');

Route::post('/awards/apply', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'application_file' => 'required|file|mimes:doc,docx,pdf|max:10240', // 10MB max
    ]);

    $awardName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->input('award_name', 'Award'));
    $file = $request->file('application_file');
    $filename = time() . '_' . $awardName . '_' . $file->getClientOriginalName();
    
    // Store in storage/app/public/award_applications
    $file->storeAs('public/award_applications', $filename);
    
    return redirect()->back()->with('success', 'Your application has been submitted successfully!');
})->name('awards.apply');

Route::get('/pre-conference', function () {
    $bannerSettings = \App\Models\SiteSetting::where('group', 'page_banners')->pluck('value', 'key')->toArray();
    $settings = \App\Models\SiteSetting::where('group', 'pre_conference')->pluck('value', 'key')->toArray();
    return view('pre_conference', compact('bannerSettings', 'settings'));
})->name('pre-conference');

Route::get('/mcc-memorial', function () {
    return view('mcc_memorial');
})->name('mcc-memorial');

