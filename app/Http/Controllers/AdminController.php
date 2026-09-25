<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\PaperSubmission;
use App\Models\RegistrationFee;
use App\Models\SiteSetting;
use App\Models\Deadline;
use App\Models\Addon;
use App\Models\Policy;
use App\Models\HeroOrganizer;

class AdminController extends Controller
{
    public function index()
    {
        $registrationCount = Registration::count();
        $submissionCount = PaperSubmission::count();
        
        // Calculate Revenue
        $totalRevenue = Registration::sum('total_amount');

        // Chart Data: Registrations by category
        $regByCategory = Registration::select('category_name', \DB::raw('count(*) as total'))
                            ->groupBy('category_name')
                            ->pluck('total', 'category_name')
                            ->toArray();

        // Recent Activity
        $recentRegistrations = Registration::orderBy('created_at', 'desc')->take(5)->get();
        $recentSubmissions = PaperSubmission::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact(
            'registrationCount', 'submissionCount', 'totalRevenue', 
            'regByCategory', 'recentRegistrations', 'recentSubmissions'
        ));
    }

    public function registrations()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();
        return view('admin.registrations', compact('registrations'));
    }

    public function deleteRegistration($id)
    {
        Registration::findOrFail($id)->delete();
        return back()->with('success', 'Registration deleted successfully.');
    }

    public function submissions()
    {
        $submissions = PaperSubmission::orderBy('created_at', 'desc')->get();
        return view('admin.submissions', compact('submissions'));
    }

    public function deleteSubmission($id)
    {
        PaperSubmission::findOrFail($id)->delete();
        return back()->with('success', 'Submission deleted successfully.');
    }

    // CMS: Registration Fees
    public function fees()
    {
        $fees = RegistrationFee::orderBy('sort_order')->get();
        $addons = \App\Models\Addon::all();
        return view('admin.fees.index', compact('fees', 'addons'));
    }

    public function storeFee(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
            'price_inr' => 'required|string|max:50',
            'price_usd' => 'nullable|string|max:50',
            'features' => 'required|string',
            'is_active' => 'boolean',
            'is_highlighted' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $data['features'] = json_encode(array_map('trim', explode("\n", $data['features'])));
        $data['is_active'] = $request->has('is_active');
        $data['is_highlighted'] = $request->has('is_highlighted');

        RegistrationFee::create($data);
        return back()->with('success', 'Fee plan created successfully.');
    }

    public function updateFee(Request $request, $id)
    {
        $fee = RegistrationFee::findOrFail($id);
        
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
            'price_inr' => 'required|string|max:50',
            'price_usd' => 'nullable|string|max:50',
            'features' => 'required|string',
            'sort_order' => 'integer'
        ]);

        $data['features'] = json_encode(array_map('trim', explode("\n", $data['features'])));
        $data['is_active'] = $request->has('is_active');
        $data['is_highlighted'] = $request->has('is_highlighted');

        $fee->update($data);
        return back()->with('success', 'Fee plan updated successfully.');
    }

    public function deleteFee($id)
    {
        RegistrationFee::findOrFail($id)->delete();
        return back()->with('success', 'Fee plan deleted.');
    }

    // CMS: Global Settings
    public function settings()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    // CMS: Hero Section Settings
    public function heroSettings()
    {
        $settings = SiteSetting::whereIn('group', ['hero', 'contact'])->get()->groupBy('group');
        $deadlines = Deadline::orderBy('sort_order')->get();
        $organizers = HeroOrganizer::orderBy('sort_order')->get();
        return view('admin.hero.index', compact('settings', 'deadlines', 'organizers'));
    }

    public function storeHeroOrganizer(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $maxOrder = HeroOrganizer::max('sort_order') ?? 0;
        HeroOrganizer::create([
            'name' => $request->name,
            'sort_order' => $maxOrder + 1,
            'is_active' => true
        ]);
        return redirect()->route('admin.hero')->with('success', 'Organizer added successfully.');
    }

    public function updateHeroOrganizer(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $organizer = HeroOrganizer::findOrFail($id);
        $organizer->update(['name' => $request->name]);
        return redirect()->route('admin.hero')->with('success', 'Organizer updated successfully.');
    }

    public function destroyHeroOrganizer($id)
    {
        $organizer = HeroOrganizer::findOrFail($id);
        $organizer->delete();
        return redirect()->route('admin.hero')->with('success', 'Organizer deleted successfully.');
    }

    public function reorderHeroOrganizers(Request $request)
    {
        $request->validate(['order' => 'required|array']);
        foreach ($request->order as $index => $id) {
            HeroOrganizer::where('id', $id)->update(['sort_order' => $index]);
        }
        return response()->json(['success' => true]);
    }

    // CMS: About Section Settings
    public function aboutSettings()
    {
        $settings = SiteSetting::where('group', 'about')->pluck('value', 'key')->all();
        return view('admin.about.index', compact('settings'));
    }

    // CMS: Conference Objectives & Framework Settings
    public function objectivesSettings()
    {
        $settings = SiteSetting::whereIn('group', ['objectives', 'participants', 'outcomes', 'journey'])->pluck('value', 'key')->all();
        return view('admin.objectives.index', compact('settings'));
    }

    public function updateObjectivesSettings(Request $request)
    {
        // 1. Objectives Section Title
        if ($request->has('objectives_section_title')) {
            SiteSetting::updateOrCreate(['key' => 'objectives_section_title'], ['value' => $request->objectives_section_title, 'group' => 'objectives']);
        }
        
        // Save Objective Cards
        if ($request->has('obj_titles')) {
            SiteSetting::where('group', 'objectives')->where(function($q) {
                $q->where('key', 'like', 'obj\_%\_title')->orWhere('key', 'like', 'obj\_%\_desc')->orWhere('key', 'like', 'obj\_%\_icon');
            })->delete();
            
            $titles = $request->input('obj_titles', []);
            $icons = $request->input('obj_icons', []);
            $descs = $request->input('obj_descs', []);
            
            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "obj_{$count}_title"], ['value' => $title, 'group' => 'objectives']);
                    SiteSetting::updateOrCreate(['key' => "obj_{$count}_icon"], ['value' => $icons[$idx] ?? 'fa-solid fa-check', 'group' => 'objectives']);
                    SiteSetting::updateOrCreate(['key' => "obj_{$count}_desc"], ['value' => $descs[$idx] ?? '', 'group' => 'objectives']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'objectives_count'], ['value' => $count, 'group' => 'objectives']);
        }

        // 2. Who Can Attend (Participants)
        if ($request->has('part_tag')) SiteSetting::updateOrCreate(['key' => 'part_tag'], ['value' => $request->part_tag, 'group' => 'participants']);
        if ($request->has('part_title')) SiteSetting::updateOrCreate(['key' => 'part_title'], ['value' => $request->part_title, 'group' => 'participants']);
        if ($request->has('part_sub')) SiteSetting::updateOrCreate(['key' => 'part_sub'], ['value' => $request->part_sub, 'group' => 'participants']);

        if ($request->has('part_labels')) {
            SiteSetting::where('group', 'participants')->where(function($q) {
                $q->where('key', 'like', 'part\_%\_label')->orWhere('key', 'like', 'part\_%\_icon');
            })->delete();
            $labels = $request->input('part_labels', []);
            $icons = $request->input('part_icons', []);
            $count = 0;
            foreach ($labels as $idx => $label) {
                if (!empty($label)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "part_{$count}_label"], ['value' => $label, 'group' => 'participants']);
                    SiteSetting::updateOrCreate(['key' => "part_{$count}_icon"], ['value' => $icons[$idx] ?? 'fa-solid fa-user', 'group' => 'participants']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'participants_count'], ['value' => $count, 'group' => 'participants']);
        }

        // 3. Key Expected Outcomes
        if ($request->has('outcomes_title')) SiteSetting::updateOrCreate(['key' => 'outcomes_title'], ['value' => $request->outcomes_title, 'group' => 'outcomes']);
        if ($request->has('outcomes_sub')) SiteSetting::updateOrCreate(['key' => 'outcomes_sub'], ['value' => $request->outcomes_sub, 'group' => 'outcomes']);

        if ($request->has('out_titles')) {
            SiteSetting::where('group', 'outcomes')->where(function($q) {
                $q->where('key', 'like', 'out\_%\_title')->orWhere('key', 'like', 'out\_%\_tag')->orWhere('key', 'like', 'out\_%\_icon');
            })->delete();
            $tags = $request->input('out_tags', []);
            $icons = $request->input('out_icons', []);
            $titles = $request->input('out_titles', []);
            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "out_{$count}_tag"], ['value' => $tags[$idx] ?? 'Outcome', 'group' => 'outcomes']);
                    SiteSetting::updateOrCreate(['key' => "out_{$count}_icon"], ['value' => $icons[$idx] ?? 'fa-solid fa-check', 'group' => 'outcomes']);
                    SiteSetting::updateOrCreate(['key' => "out_{$count}_title"], ['value' => $title, 'group' => 'outcomes']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'outcomes_count'], ['value' => $count, 'group' => 'outcomes']);
        }

        // 4. Our Journey to Impact
        if ($request->has('journey_title')) SiteSetting::updateOrCreate(['key' => 'journey_title'], ['value' => $request->journey_title, 'group' => 'journey']);
        if ($request->has('journey_sub')) SiteSetting::updateOrCreate(['key' => 'journey_sub'], ['value' => $request->journey_sub, 'group' => 'journey']);

        if ($request->has('journey_titles')) {
            SiteSetting::where('group', 'journey')->where(function($q) {
                $q->where('key', 'like', 'journey\_%\_title')->orWhere('key', 'like', 'journey\_%\_desc');
            })->delete();
            $titles = $request->input('journey_titles', []);
            $descs = $request->input('journey_descs', []);
            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "journey_{$count}_title"], ['value' => $title, 'group' => 'journey']);
                    SiteSetting::updateOrCreate(['key' => "journey_{$count}_desc"], ['value' => $descs[$idx] ?? '', 'group' => 'journey']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'journey_count'], ['value' => $count, 'group' => 'journey']);
        }

        return back()->with('success', 'Conference Objectives and Strategic Framework updated successfully.');
    }

    // CMS: Who Can Attend (Participants) Settings
    public function participantsSettings()
    {
        $settings = SiteSetting::where('group', 'participants')->pluck('value', 'key')->all();
        return view('admin.participants.index', compact('settings'));
    }

    // CMS: Key Expected Outcomes Settings
    public function outcomesSettings()
    {
        $settings = SiteSetting::where('group', 'outcomes')->pluck('value', 'key')->all();
        return view('admin.outcomes.index', compact('settings'));
    }

    // CMS: About Organizer Settings
    public function aboutOrganizerSettings()
    {
        $settings = SiteSetting::where('group', 'about_organizer')->pluck('value', 'key')->all();
        return view('admin.about_organizer.index', compact('settings'));
    }

    // CMS: Guidelines Settings
    public function guidelinesSettings()
    {
        $settings = SiteSetting::where('group', 'guidelines')->pluck('value', 'key')->all();
        return view('admin.guidelines.index', compact('settings'));
    }

    public function updateGuidelinesSettings(Request $request)
    {
        // Section titles & static fields
        if ($request->has('abstract_tag')) SiteSetting::updateOrCreate(['key' => 'abstract_tag'], ['value' => $request->abstract_tag, 'group' => 'guidelines']);
        if ($request->has('abstract_title')) SiteSetting::updateOrCreate(['key' => 'abstract_title'], ['value' => $request->abstract_title, 'group' => 'guidelines']);
        if ($request->has('oral_title')) SiteSetting::updateOrCreate(['key' => 'oral_title'], ['value' => $request->oral_title, 'group' => 'guidelines']);
        if ($request->has('poster_title')) SiteSetting::updateOrCreate(['key' => 'poster_title'], ['value' => $request->poster_title, 'group' => 'guidelines']);
        if ($request->has('poster_dim_label')) SiteSetting::updateOrCreate(['key' => 'poster_dim_label'], ['value' => $request->poster_dim_label, 'group' => 'guidelines']);
        if ($request->has('poster_dim_val')) SiteSetting::updateOrCreate(['key' => 'poster_dim_val'], ['value' => $request->poster_dim_val, 'group' => 'guidelines']);
        if ($request->has('pub_title')) SiteSetting::updateOrCreate(['key' => 'pub_title'], ['value' => $request->pub_title, 'group' => 'guidelines']);
        if ($request->has('pub_desc')) SiteSetting::updateOrCreate(['key' => 'pub_desc'], ['value' => $request->pub_desc, 'group' => 'guidelines']);

        // 1. Abstract Bullet Items
        if ($request->has('abstract_items')) {
            SiteSetting::where('group', 'guidelines')->where('key', 'like', 'abstract\_item\_%')->delete();
            $items = $request->input('abstract_items', []);
            $count = 0;
            foreach ($items as $item) {
                if (!empty($item)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "abstract_item_{$count}"], ['value' => $item, 'group' => 'guidelines']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'abstract_count'], ['value' => $count, 'group' => 'guidelines']);
        }

        // 2. Oral Bullet Items
        if ($request->has('oral_items')) {
            SiteSetting::where('group', 'guidelines')->where('key', 'like', 'oral\_item\_%')->delete();
            $items = $request->input('oral_items', []);
            $count = 0;
            foreach ($items as $item) {
                if (!empty($item)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "oral_item_{$count}"], ['value' => $item, 'group' => 'guidelines']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'oral_count'], ['value' => $count, 'group' => 'guidelines']);
        }

        // 3. Poster Bullet Items
        if ($request->has('poster_items')) {
            SiteSetting::where('group', 'guidelines')->where('key', 'like', 'poster\_item\_%')->delete();
            $items = $request->input('poster_items', []);
            $count = 0;
            foreach ($items as $item) {
                if (!empty($item)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "poster_item_{$count}"], ['value' => $item, 'group' => 'guidelines']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'poster_count'], ['value' => $count, 'group' => 'guidelines']);
        }

        // 4. Scientific Publication Cards
        if ($request->has('pub_titles')) {
            SiteSetting::where('group', 'guidelines')->where(function($q) {
                $q->where('key', 'like', 'pub\_%\_title')->orWhere('key', 'like', 'pub\_%\_desc');
            })->delete();
            $titles = $request->input('pub_titles', []);
            $descs = $request->input('pub_descs', []);
            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "pub_{$count}_title"], ['value' => $title, 'group' => 'guidelines']);
                    SiteSetting::updateOrCreate(['key' => "pub_{$count}_desc"], ['value' => $descs[$idx] ?? '', 'group' => 'guidelines']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'pub_count'], ['value' => $count, 'group' => 'guidelines']);
        }

        return back()->with('success', 'Guidelines updated successfully.');
    }

    // CMS: Programme Schedule Settings
    public function scheduleSettings()
    {
        $settings = SiteSetting::where('group', 'schedule')->pluck('value', 'key')->all();
        return view('admin.schedule.index', compact('settings'));
    }

    public function updateScheduleSettings(Request $request)
    {
        if ($request->has('sched_title')) SiteSetting::updateOrCreate(['key' => 'sched_title'], ['value' => $request->sched_title, 'group' => 'schedule']);
        if ($request->has('sched_sub')) SiteSetting::updateOrCreate(['key' => 'sched_sub'], ['value' => $request->sched_sub, 'group' => 'schedule']);
        if ($request->has('sched_day1_title')) SiteSetting::updateOrCreate(['key' => 'sched_day1_title'], ['value' => $request->sched_day1_title, 'group' => 'schedule']);
        if ($request->has('sched_day1_time')) SiteSetting::updateOrCreate(['key' => 'sched_day1_time'], ['value' => $request->sched_day1_time, 'group' => 'schedule']);
        if ($request->has('sched_day2_title')) SiteSetting::updateOrCreate(['key' => 'sched_day2_title'], ['value' => $request->sched_day2_title, 'group' => 'schedule']);
        if ($request->has('sched_day2_time')) SiteSetting::updateOrCreate(['key' => 'sched_day2_time'], ['value' => $request->sched_day2_time, 'group' => 'schedule']);
        if ($request->has('sched_tracks_title')) SiteSetting::updateOrCreate(['key' => 'sched_tracks_title'], ['value' => $request->sched_tracks_title, 'group' => 'schedule']);
        if ($request->has('sched_tracks_sub')) SiteSetting::updateOrCreate(['key' => 'sched_tracks_sub'], ['value' => $request->sched_tracks_sub, 'group' => 'schedule']);

        // Day 1 Rows
        if ($request->has('day1_titles')) {
            SiteSetting::where('group', 'schedule')->where('key', 'like', 'day1\_%\_%')->delete();
            $times = $request->input('day1_times', []);
            $titles = $request->input('day1_titles', []);
            $badges = $request->input('day1_badges', []);
            $icons = $request->input('day1_icons', []);
            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "day1_{$count}_time"], ['value' => $times[$idx] ?? '', 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "day1_{$count}_title"], ['value' => $title, 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "day1_{$count}_badge"], ['value' => $badges[$idx] ?? '', 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "day1_{$count}_icon"], ['value' => $icons[$idx] ?? 'fa-clock', 'group' => 'schedule']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'day1_count'], ['value' => $count, 'group' => 'schedule']);
        }

        // Day 2 Rows
        if ($request->has('day2_titles')) {
            SiteSetting::where('group', 'schedule')->where('key', 'like', 'day2\_%\_%')->delete();
            $times = $request->input('day2_times', []);
            $titles = $request->input('day2_titles', []);
            $badges = $request->input('day2_badges', []);
            $icons = $request->input('day2_icons', []);
            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "day2_{$count}_time"], ['value' => $times[$idx] ?? '', 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "day2_{$count}_title"], ['value' => $title, 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "day2_{$count}_badge"], ['value' => $badges[$idx] ?? '', 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "day2_{$count}_icon"], ['value' => $icons[$idx] ?? 'fa-clock', 'group' => 'schedule']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'day2_count'], ['value' => $count, 'group' => 'schedule']);
        }

        // Tracks Rows
        if ($request->has('track_names')) {
            SiteSetting::where('group', 'schedule')->where('key', 'like', 'track\_%\_%')->delete();
            $names = $request->input('track_names', []);
            $topics = $request->input('track_topics', []);
            $colors = $request->input('track_colors', []);
            $count = 0;
            foreach ($names as $idx => $name) {
                if (!empty($name)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "track_{$count}_name"], ['value' => $name, 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "track_{$count}_topic"], ['value' => $topics[$idx] ?? '', 'group' => 'schedule']);
                    SiteSetting::updateOrCreate(['key' => "track_{$count}_color"], ['value' => $colors[$idx] ?? '#009688', 'group' => 'schedule']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'track_count'], ['value' => $count, 'group' => 'schedule']);
        }

        return back()->with('success', 'Programme Schedule settings updated successfully.');
    }

    // CMS: Conference Section Settings
    public function conferenceSettings()
    {
        $settings = SiteSetting::whereIn('group', ['conference', 'objectives', 'participants'])->get()->groupBy('group');
        return view('admin.conference.index', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/settings'), $fileName);
                $value = 'images/settings/' . $fileName;
            } elseif ($value === null && SiteSetting::where('key', $key)->value('type') === 'image') {
                continue;
            }
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        return back()->with('success', 'Settings updated successfully.');
    }

    // CMS: Pillars Settings
    public function pillarsSettings()
    {
        $settings = SiteSetting::whereIn('group', ['pillars'])->get()->groupBy('group');
        return view('admin.pillars.index', compact('settings'));
    }

    // CMS: Registration Page Settings
    public function registrationSettings()
    {
        $settings = SiteSetting::pluck('value', 'key')->all();
        $interestOptions = \App\Models\InterestOption::orderBy('sort_order')->get();
        $policies = \App\Models\Policy::orderBy('sort_order')->get();
        return view('admin.settings.registration', compact('settings', 'interestOptions', 'policies'));
    }

    public function updateRegistrationSettings(Request $request)
    {
        if ($request->has('reg_section_title')) SiteSetting::updateOrCreate(['key' => 'reg_section_title'], ['value' => $request->reg_section_title, 'group' => 'registration']);
        if ($request->has('reg_section_sub')) SiteSetting::updateOrCreate(['key' => 'reg_section_sub'], ['value' => $request->reg_section_sub, 'group' => 'registration']);
        if ($request->has('reg_proc_title')) SiteSetting::updateOrCreate(['key' => 'reg_proc_title'], ['value' => $request->reg_proc_title, 'group' => 'registration']);
        if ($request->has('reg_proc_sub')) SiteSetting::updateOrCreate(['key' => 'reg_proc_sub'], ['value' => $request->reg_proc_sub, 'group' => 'registration']);
        if ($request->has('reg_proc_heading')) SiteSetting::updateOrCreate(['key' => 'reg_proc_heading'], ['value' => $request->reg_proc_heading, 'group' => 'registration']);

        if ($request->has('reg_steps')) {
            SiteSetting::where('group', 'registration')->where('key', 'like', 'reg\_step\_%')->delete();
            $steps = $request->input('reg_steps', []);
            $count = 0;
            foreach ($steps as $step) {
                if (!empty($step)) {
                    $count++;
                    SiteSetting::updateOrCreate(['key' => "reg_step_{$count}"], ['value' => $step, 'group' => 'registration']);
                }
            }
            SiteSetting::updateOrCreate(['key' => 'reg_step_count'], ['value' => $count, 'group' => 'registration']);
        }

        return back()->with('success', 'Registration settings updated successfully.');
    }

    // CMS: Interest Options
    public function storeInterestOption(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'integer'
        ]);
        \App\Models\InterestOption::create($data);
        return back()->with('success', 'Option created successfully.');
    }

    public function deleteInterestOption($id)
    {
        \App\Models\InterestOption::findOrFail($id)->delete();
        return back()->with('success', 'Option deleted successfully.');
    }

    // CMS: Programs & Themes (Workshop & Thrust Areas)
    public function programsSettings()
    {
        $settings = SiteSetting::whereIn('group', ['workshop', 'thrust_areas'])->get()->groupBy('group');
        $tracks = \App\Models\Track::orderBy('sort_order')->get();
        return view('admin.programs.index', compact('settings', 'tracks'));
    }

    public function updateProgramsSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            // Handle image uploads if present
            if (str_ends_with($key, '_file')) {
                if ($request->hasFile($key)) {
                    $originalKey = str_replace('_file', '', $key);
                    $file = $request->file($key);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/settings'), $fileName);
                    SiteSetting::where('key', $originalKey)->update(['value' => 'images/settings/' . $fileName]);
                }
                continue;
            }
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }
        return back()->with('success', 'Programs & Themes updated successfully.');
    }

    public function storeTrack(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'integer',
            'bullet_points' => 'nullable|array'
        ]);

        // Filter out empty bullet points
        if (isset($data['bullet_points'])) {
            $data['bullet_points'] = array_filter($data['bullet_points'], fn($val) => !empty(trim($val)));
            $data['bullet_points'] = array_values($data['bullet_points']);
        } else {
            $data['bullet_points'] = [];
        }

        \App\Models\Track::create($data);
        return back()->with('success', 'Track created successfully.');
    }

    public function updateTrack(Request $request, $id)
    {
        $track = \App\Models\Track::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'integer',
            'bullet_points' => 'nullable|array'
        ]);

        if (isset($data['bullet_points'])) {
            $data['bullet_points'] = array_filter($data['bullet_points'], fn($val) => !empty(trim($val)));
            $data['bullet_points'] = array_values($data['bullet_points']);
        } else {
            $data['bullet_points'] = [];
        }

        $track->update($data);
        return back()->with('success', 'Track updated successfully.');
    }

    public function destroyTrack($id)
    {
        \App\Models\Track::findOrFail($id)->delete();
        return back()->with('success', 'Track deleted successfully.');
    }

    // CMS: Abstracts & Awards
    public function abstractsAwards()
    {
        $settings = SiteSetting::whereIn('group', ['abstract', 'awards'])->get()->groupBy('group');
        return view('admin.settings.abstracts_awards', compact('settings'));
    }

    public function updateAbstractsAwards(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            // Handle image uploads if present
            if (str_ends_with($key, '_file')) {
                if ($request->hasFile($key)) {
                    $originalKey = str_replace('_file', '', $key);
                    $file = $request->file($key);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/settings'), $fileName);
                    SiteSetting::where('key', $originalKey)->update(['value' => 'images/settings/' . $fileName]);
                }
                continue;
            }
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }
        return back()->with('success', 'Abstracts & Awards settings updated successfully.');
    }

    // CMS: Venue Highlights
    public function venueHighlights()
    {
        $settings = SiteSetting::where('group', 'venue_highlights')->get()->groupBy('group');
        return view('admin.settings.venue_highlights', compact('settings'));
    }

    // CMS: Venue
    public function venueSettings()
    {
        $settings = SiteSetting::where('group', 'venue')->get()->groupBy('group');
        return view('admin.settings.venue', compact('settings'));
    }

    public function updateVenueSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if (str_ends_with($key, '_file')) {
                if ($request->hasFile($key)) {
                    $originalKey = str_replace('_file', '', $key);
                    $file = $request->file($key);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/venue'), $fileName);
                    SiteSetting::updateOrCreate(
                        ['key' => $originalKey, 'group' => 'venue'],
                        ['value' => 'images/venue/' . $fileName]
                    );
                }
                continue;
            }
            SiteSetting::updateOrCreate(
                ['key' => $key, 'group' => 'venue'],
                ['value' => $value]
            );
        }
        return back()->with('success', 'Venue settings updated successfully.');
    }

    // CMS: Deadlines
    public function deadlines()
    {
        $deadlines = Deadline::orderBy('sort_order')->get();
        $settings = ['deadlines' => SiteSetting::where('group', 'deadlines')->get()];
        return view('admin.deadlines.index', compact('deadlines', 'settings'));
    }

    public function storeDeadline(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'deadline_date' => 'required|date',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);
        
        $data['is_active'] = $request->has('is_active');
        Deadline::create($data);
        return back()->with('success', 'Deadline added.');
    }

    public function updateDeadline(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'deadline_date' => 'required|date',
            'sort_order' => 'integer'
        ]);
        
        $data['is_active'] = $request->has('is_active');
        Deadline::findOrFail($id)->update($data);
        return back()->with('success', 'Deadline updated.');
    }

    public function deleteDeadline($id)
    {
        Deadline::findOrFail($id)->delete();
        return back()->with('success', 'Deadline deleted.');
    }

    // CMS: Addons
    public function addons()
    {
        $addons = Addon::all();
        return view('admin.addons.index', compact('addons'));
    }

    public function storeAddon(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'badge_text' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean'
        ]);
        $data['is_active'] = $request->has('is_active');
        Addon::create($data);
        return back()->with('success', 'Add-on created successfully.');
    }

    public function updateAddon(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'badge_text' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean'
        ]);
        $data['is_active'] = $request->has('is_active');
        Addon::findOrFail($id)->update($data);
        return back()->with('success', 'Add-on updated successfully.');
    }

    public function deleteAddon($id)
    {
        Addon::findOrFail($id)->delete();
        return back()->with('success', 'Add-on deleted successfully.');
    }

    // CMS: Policies
    public function policies()
    {
        $policies = Policy::orderBy('sort_order')->get();
        return view('admin.policies.index', compact('policies'));
    }

    public function storePolicy(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content_html' => 'required|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);
        $data['is_active'] = $request->has('is_active');
        Policy::create($data);
        return back()->with('success', 'Policy created successfully.');
    }

    public function updatePolicy(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content_html' => 'required|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);
        $data['is_active'] = $request->has('is_active');
        Policy::findOrFail($id)->update($data);
        return back()->with('success', 'Policy updated successfully.');
    }

    public function deletePolicy($id)
    {
        Policy::findOrFail($id)->delete();
        return back()->with('success', 'Policy deleted successfully.');
    }

    public function submitPaperSettings()
    {
        $settings = SiteSetting::where('group', 'submit_paper')->get();
        return view('admin.settings.submit_paper', compact('settings'));
    }

    public function updateSubmitPaperSettings(Request $request)
    {
        $settings = $request->except(['_token']);
        foreach ($settings as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/settings'), $fileName);
                $value = 'images/settings/' . $fileName;
            } elseif ($value === null && SiteSetting::where('key', $key)->value('type') === 'image') {
                continue;
            } elseif ($value === null && SiteSetting::where('key', $key)->value('type') === 'file') {
                continue;
            }
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }
        return back()->with('success', 'Submit Paper settings updated successfully.');
    }

    // CMS: Page Banners
    public function pageBanners()
    {
        $settings = \App\Models\SiteSetting::where('group', 'page_banners')->get();
        // Group by page prefix, e.g., 'banner_registration_title' -> 'registration'
        $groupedSettings = [];
        foreach ($settings as $setting) {
            $parts = explode('_', $setting->key);
            if (count($parts) >= 3) {
                // banner_{page}_type
                $type = array_pop($parts); // title or image
                array_shift($parts); // remove 'banner'
                $page = implode('_', $parts); // e.g., registration, plenary_speakers
                $groupedSettings[$page][$type] = $setting;
            }
        }
        return view('admin.settings.page_banners', compact('groupedSettings'));
    }

    public function updatePageBanners(Request $request)
    {
        $settings = $request->except(['_token']);
        foreach ($settings as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/settings'), $fileName);
                $value = 'images/settings/' . $fileName;
            } elseif ($value === null && SiteSetting::where('key', $key)->value('type') === 'image') {
                continue;
            }
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }
        return back()->with('success', 'Page Banners updated successfully.');
    }

    // --- Submit Paper Form Builder ---
    public function submitPaperFormFields()
    {
        $fields = \App\Models\SubmitPaperField::orderBy('sort_order')->get();
        return view('admin.submit_paper_fields.index', compact('fields'));
    }

    public function storeSubmitPaperFormField(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:submit_paper_fields,name',
            'label' => 'required|string|max:255',
            'type' => 'required|string',
            'placeholder' => 'nullable|string',
            'grid_column' => 'required|string',
            'sort_order' => 'integer',
            'options' => 'nullable|string', 
        ]);
        
        $data['is_required'] = $request->has('is_required');
        
        if (!empty($data['options'])) {
            $data['options'] = array_map('trim', explode(',', $data['options']));
        } else {
            $data['options'] = null;
        }

        \App\Models\SubmitPaperField::create($data);
        return back()->with('success', 'Field added successfully.');
    }

    public function updateSubmitPaperFormField(Request $request, $id)
    {
        $field = \App\Models\SubmitPaperField::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:submit_paper_fields,name,' . $id,
            'label' => 'required|string|max:255',
            'type' => 'required|string',
            'placeholder' => 'nullable|string',
            'grid_column' => 'required|string',
            'sort_order' => 'integer',
            'options' => 'nullable|string',
        ]);
        
        $data['is_required'] = $request->has('is_required');

        if (!empty($data['options'])) {
            $data['options'] = array_map('trim', explode(',', $data['options']));
        } else {
            $data['options'] = null;
        }

        $field->update($data);
        return back()->with('success', 'Field updated successfully.');
    }

    public function destroySubmitPaperFormField($id)
    {
        \App\Models\SubmitPaperField::findOrFail($id)->delete();
        return back()->with('success', 'Field deleted successfully.');
    }

    // --- Speakers CMS ---

    public function speakers(Request $request)
    {
        $type = $request->query('type', 'keynote'); // Default to keynote
        $speakers = \App\Models\Speaker::where('type', $type)->orderBy('sort_order')->get();
        return view('admin.speakers.index', compact('speakers', 'type'));
    }

    public function storeSpeaker(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|in:keynote,distinguished',
            'name' => 'required|string|max:255',
            'h_index' => 'nullable|string|max:50',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'title' => 'nullable|string', // Some invited speakers might not have titles
            'sort_order' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/speakers'), $imageName);
            $data['image_path'] = 'images/speakers/' . $imageName;
        }

        \App\Models\Speaker::create($data);
        return back()->with('success', 'Speaker added successfully.');
    }

    public function updateSpeaker(Request $request, $id)
    {
        $speaker = \App\Models\Speaker::findOrFail($id);
        
        $data = $request->validate([
            'type' => 'required|string|in:keynote,distinguished',
            'name' => 'required|string|max:255',
            'h_index' => 'nullable|string|max:50',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'title' => 'nullable|string',
            'sort_order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/speakers'), $imageName);
            $data['image_path'] = 'images/speakers/' . $imageName;
            
            // Optionally delete old image
            if ($speaker->image_path && file_exists(public_path($speaker->image_path))) {
                // To avoid deleting default seeded images, we could add logic here, 
                // but for now let's just leave old files or delete them.
                // unlink(public_path($speaker->image_path));
            }
        }

        $speaker->update($data);
        return back()->with('success', 'Speaker updated successfully.');
    }

    public function destroySpeaker($id)
    {
        $speaker = \App\Models\Speaker::findOrFail($id);
        $speaker->delete();
        return back()->with('success', 'Speaker deleted successfully.');
    }

    // --- Topics CMS ---

    public function topics(Request $request)
    {
        $column = $request->query('column', 1);
        $topics = \App\Models\Topic::where('column_number', $column)->orderBy('sort_order')->get();
        $settings = \App\Models\SiteSetting::where('group', 'topics')->get()->groupBy('group');
        return view('admin.topics.index', compact('topics', 'column', 'settings'));
    }

    public function updateTopicsSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if (str_ends_with($key, '_file')) {
                if ($request->hasFile($key)) {
                    $originalKey = str_replace('_file', '', $key);
                    $file = $request->file($key);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/settings'), $fileName);
                    \App\Models\SiteSetting::updateOrCreate(['key' => $originalKey, 'group' => 'topics'], ['value' => 'images/settings/' . $fileName]);
                }
                continue;
            }
            \App\Models\SiteSetting::updateOrCreate(['key' => $key, 'group' => 'topics'], ['value' => $value]);
        }
        return back()->with('success', 'Topic settings updated successfully.');
    }

    public function storeTopic(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'column_number' => 'required|integer|in:1,2,3',
            'sort_order' => 'required|integer',
        ]);

        \App\Models\Topic::create($data);
        return back()->with('success', 'Topic added successfully.');
    }

    public function updateTopic(Request $request, $id)
    {
        $topic = \App\Models\Topic::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'column_number' => 'required|integer|in:1,2,3',
            'sort_order' => 'required|integer',
        ]);

        $topic->update($data);
        return back()->with('success', 'Topic updated successfully.');
    }

    public function destroyTopic($id)
    {
        $topic = \App\Models\Topic::findOrFail($id);
        $topic->delete();
        return back()->with('success', 'Topic deleted successfully.');
    }

    // --- Highlights CMS ---

    public function highlights(Request $request)
    {
        $column = $request->query('column', 1);
        $highlights = \App\Models\Highlight::where('column_number', $column)->orderBy('sort_order')->get();
        $settings = \App\Models\SiteSetting::where('group', 'highlights')->get()->groupBy('group');
        return view('admin.highlights.index', compact('highlights', 'column', 'settings'));
    }

    public function updateHighlightsSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if (str_ends_with($key, '_file')) {
                if ($request->hasFile($key)) {
                    $originalKey = str_replace('_file', '', $key);
                    $file = $request->file($key);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/settings'), $fileName);
                    \App\Models\SiteSetting::updateOrCreate(['key' => $originalKey, 'group' => 'highlights'], ['value' => 'images/settings/' . $fileName]);
                }
                continue;
            }
            \App\Models\SiteSetting::updateOrCreate(['key' => $key, 'group' => 'highlights'], ['value' => $value]);
        }
        return back()->with('success', 'Highlight settings updated successfully.');
    }

    public function storeHighlight(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'column_number' => 'required|integer|in:1,2,3',
            'sort_order' => 'required|integer',
        ]);

        \App\Models\Highlight::create($data);
        return back()->with('success', 'Highlight added successfully.');
    }

    public function updateHighlight(Request $request, $id)
    {
        $topic = \App\Models\Highlight::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'column_number' => 'required|integer|in:1,2,3',
            'sort_order' => 'required|integer',
        ]);

        $topic->update($data);
        return back()->with('success', 'Highlight updated successfully.');
    }

    public function destroyHighlight($id)
    {
        $topic = \App\Models\Highlight::findOrFail($id);
        $topic->delete();
        return back()->with('success', 'Highlight deleted successfully.');
    }

    // --- Committee CMS ---

    public function committee(Request $request)
    {
        $category = $request->query('category', 'leadership'); // Default to leadership
        
        if ($category === 'settings') {
            $settings = \App\Models\SiteSetting::where('group', 'committee_page')->pluck('value', 'key')->all();
            return view('admin.committee.settings', compact('settings', 'category'));
        }

        $members = \App\Models\CommitteeMember::where('category', $category)->orderBy('sort_order')->get();
        return view('admin.committee.index', compact('members', 'category'));
    }

    public function updateCommitteeSettings(Request $request)
    {
        $settings = $request->except(['_token']);
        foreach ($settings as $key => $value) {
            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key, 'group' => 'committee_page'],
                ['value' => $value]
            );
        }
        return back()->with('success', 'Committee Page Settings updated successfully.');
    }

    public function storeCommitteeMember(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'category' => 'required|string|in:leadership,organizing_committee,advisory_committee',
            'subcategory' => 'nullable|string|in:chief_patron,patrons,convenor,co_convenors,organizing_secretaries,national,international,other',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        \App\Models\CommitteeMember::create($data);
        return back()->with('success', 'Committee member added successfully.');
    }

    public function updateCommitteeMember(Request $request, $id)
    {
        $member = \App\Models\CommitteeMember::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'category' => 'required|string|in:leadership,organizing_committee,advisory_committee',
            'subcategory' => 'nullable|string|in:chief_patron,patrons,convenor,co_convenors,organizing_secretaries,national,international,other',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $member->update($data);
        return back()->with('success', 'Committee member updated successfully.');
    }

    public function destroyCommitteeMember($id)
    {
        $member = \App\Models\CommitteeMember::findOrFail($id);
        $member->delete();
        return back()->with('success', 'Committee member deleted successfully.');
    }
    // --- Sponsors CMS ---

    public function sponsors()
    {
        $settings = \App\Models\SiteSetting::where('group', 'sponsors')->get()->groupBy('group');
        $tiers = \App\Models\SponsorPackage::where('type', 'tier')->orderBy('sort_order')->get();
        $additional = \App\Models\SponsorPackage::where('type', 'additional')->orderBy('sort_order')->get();
        return view('admin.sponsors.index', compact('settings', 'tiers', 'additional'));
    }

    public function updateSponsorSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            \App\Models\SiteSetting::updateOrCreate(['key' => $key, 'group' => 'sponsors'], ['value' => $value]);
        }
        return back()->with('success', 'Sponsor settings updated successfully.');
    }

    public function storeSponsorPackage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'features' => 'nullable|string',
            'ribbon_color' => 'nullable|string|max:255',
            'type' => 'required|string|in:tier,additional',
            'sort_order' => 'required|integer',
        ]);

        if (!empty($data['features'])) {
            $data['features'] = array_map('trim', explode("\n", $data['features']));
        } else {
            $data['features'] = null;
        }

        \App\Models\SponsorPackage::create($data);
        return back()->with('success', 'Sponsor package added successfully.');
    }

    public function updateSponsorPackage(Request $request, $id)
    {
        $package = \App\Models\SponsorPackage::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'features' => 'nullable|string',
            'ribbon_color' => 'nullable|string|max:255',
            'type' => 'required|string|in:tier,additional',
            'sort_order' => 'required|integer',
        ]);

        if (!empty($data['features'])) {
            $data['features'] = array_map('trim', explode("\n", $data['features']));
        } else {
            $data['features'] = null;
        }

        $package->update($data);
        return back()->with('success', 'Sponsor package updated successfully.');
    }

    public function destroySponsorPackage($id)
    {
        $package = \App\Models\SponsorPackage::findOrFail($id);
        $package->delete();
        return back()->with('success', 'Sponsor package deleted successfully.');
    }

    // --- Awards CMS ---
    public function awards()
    {
        $settings = \App\Models\SiteSetting::whereIn('group', ['awards_page', 'awards'])->pluck('value', 'key')->all();
        $awards = \App\Models\Award::orderBy('sort_order')->get();
        return view('admin.awards.index', compact('settings', 'awards'));
    }

    public function updateAwardsSettings(Request $request)
    {
        if ($request->has('awards_section_title')) \App\Models\SiteSetting::updateOrCreate(['key' => 'awards_section_title'], ['value' => $request->awards_section_title, 'group' => 'awards_page']);
        if ($request->has('awards_section_sub')) \App\Models\SiteSetting::updateOrCreate(['key' => 'awards_section_sub'], ['value' => $request->awards_section_sub, 'group' => 'awards_page']);
        if ($request->has('awards_footer_icon')) \App\Models\SiteSetting::updateOrCreate(['key' => 'awards_footer_icon'], ['value' => $request->awards_footer_icon, 'group' => 'awards_page']);
        if ($request->has('awards_footer_note')) \App\Models\SiteSetting::updateOrCreate(['key' => 'awards_footer_note'], ['value' => $request->awards_footer_note, 'group' => 'awards_page']);

        if ($request->has('award_titles')) {
            \App\Models\SiteSetting::where('group', 'awards_page')->where(function($q) {
                $q->where('key', 'like', 'award\_%\_title')->orWhere('key', 'like', 'award\_%\_amount')->orWhere('key', 'like', 'award\_%\_icon');
            })->delete();

            $titles = $request->input('award_titles', []);
            $amounts = $request->input('award_amounts', []);
            $icons = $request->input('award_icons', []);

            $count = 0;
            foreach ($titles as $idx => $title) {
                if (!empty($title)) {
                    $count++;
                    \App\Models\SiteSetting::updateOrCreate(['key' => "award_{$count}_title"], ['value' => $title, 'group' => 'awards_page']);
                    \App\Models\SiteSetting::updateOrCreate(['key' => "award_{$count}_amount"], ['value' => $amounts[$idx] ?? '', 'group' => 'awards_page']);
                    \App\Models\SiteSetting::updateOrCreate(['key' => "award_{$count}_icon"], ['value' => $icons[$idx] ?? 'fa-solid fa-award', 'group' => 'awards_page']);
                }
            }
            \App\Models\SiteSetting::updateOrCreate(['key' => 'awards_count'], ['value' => $count, 'group' => 'awards_page']);
        }

        return back()->with('success', 'Awards settings updated successfully.');
    }

    public function storeAward(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'icon_color' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'benefits' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'guidelines' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);
        
        \App\Models\Award::create($data);
        return back()->with('success', 'Award created successfully.');
    }

    public function updateAward(Request $request, $id)
    {
        $award = \App\Models\Award::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'icon_color' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'benefits' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'guidelines' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $award->update($data);
        return back()->with('success', 'Award updated successfully.');
    }

    public function destroyAward($id)
    {
        \App\Models\Award::findOrFail($id)->delete();
        return back()->with('success', 'Award deleted successfully.');
    }

    // CMS: Event Details (Schedule, Deadlines, Venue)
    public function eventDetails()
    {
        $groupedSettings = \App\Models\SiteSetting::whereIn('group', ['venue', 'deadlines'])->get()->groupBy('group');
        $settings = \App\Models\SiteSetting::whereIn('group', ['venue', 'schedule', 'deadlines'])->pluck('value', 'key');
        
        // Inject the grouped collections so views expecting them (venue, deadlines) don't break
        $settings['venue'] = $groupedSettings->get('venue', collect([]));
        $settings['deadlines'] = $groupedSettings->get('deadlines', collect([]));

        $deadlines = \App\Models\Deadline::orderBy('sort_order')->get();
        return view('admin.event_details.index', compact('settings', 'deadlines'));
    }

    public function updateEventDetails(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if (str_ends_with($key, '_file')) {
                if ($request->hasFile($key)) {
                    $originalKey = str_replace('_file', '', $key);
                    $file = $request->file($key);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/event'), $fileName);
                    \App\Models\SiteSetting::updateOrCreate(
                        ['key' => $originalKey],
                        ['value' => 'images/event/' . $fileName, 'group' => 'venue']
                    );
                }
                continue;
            }
            
            // Assume schedule settings starts with sched_ or day1_ or day2_
            $group = (str_starts_with($key, 'sched_') || str_starts_with($key, 'day1_') || str_starts_with($key, 'day2_')) ? 'schedule' : 'venue';
            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? json_encode($value) : $value, 'group' => $group]
            );
        }
        return back()->with('success', 'Event Details updated successfully.');
    }

    public function homeSettings()
    {
        return view('admin.home.index');
    }

    public function updateHomeSettings(Request $request)
    {
        return back()->with('success', 'Home Settings updated successfully.');
    }

    public function preConferenceSettings()
    {
        $settings = \App\Models\SiteSetting::where('group', 'pre_conference')->pluck('value', 'key')->all();
        return view('admin.pre_conference.index', compact('settings'));
    }

    public function updatePreConferenceSettings(Request $request)
    {
        if ($request->has('pre_conf_preamble')) \App\Models\SiteSetting::updateOrCreate(['key' => 'pre_conf_preamble', 'group' => 'pre_conference'], ['value' => $request->pre_conf_preamble]);
        if ($request->has('pre_conf_schedule_note')) \App\Models\SiteSetting::updateOrCreate(['key' => 'pre_conf_schedule_note', 'group' => 'pre_conference'], ['value' => $request->pre_conf_schedule_note]);
        if ($request->has('pre_conf_panel')) \App\Models\SiteSetting::updateOrCreate(['key' => 'pre_conf_panel', 'group' => 'pre_conference'], ['value' => $request->pre_conf_panel]);

        if ($request->has('pre_conf_obj')) {
            \App\Models\SiteSetting::where('group', 'pre_conference')->where('key', 'like', 'pre_conf_obj_%')->delete();
            $objs = $request->input('pre_conf_obj', []);
            $count = 0;
            foreach ($objs as $obj) {
                if (!empty($obj)) {
                    $count++;
                    \App\Models\SiteSetting::create(['key' => "pre_conf_obj_{$count}", 'value' => $obj, 'group' => 'pre_conference']);
                }
            }
        }

        if ($request->has('speaker_names')) {
            // Store old images just in case we need to keep them when no new file is uploaded
            $oldImages = \App\Models\SiteSetting::where('group', 'pre_conference')->where('key', 'like', 'pre_conf_speaker_%_image')->pluck('value', 'key')->all();
            
            \App\Models\SiteSetting::where('group', 'pre_conference')->where('key', 'like', 'pre_conf_speaker_%')->delete();
            
            $names = $request->input('speaker_names', []);
            $affiliations = $request->input('speaker_affiliations', []);
            $expertises = $request->input('speaker_expertises', []);
            $images = $request->file('speaker_images', []);
            $oldImageInputs = $request->input('old_speaker_images', []);

            $count = 0;
            foreach ($names as $idx => $name) {
                if (!empty($name)) {
                    $count++;
                    $imagePath = $oldImageInputs[$idx] ?? '';
                    if (isset($images[$idx])) {
                        $file = $images[$idx];
                        $filename = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/speakers'), $filename);
                        $imagePath = 'images/speakers/' . $filename;
                    }
                    
                    \App\Models\SiteSetting::create(['key' => "pre_conf_speaker_{$count}_name", 'value' => $name, 'group' => 'pre_conference']);
                    \App\Models\SiteSetting::create(['key' => "pre_conf_speaker_{$count}_image", 'value' => $imagePath, 'group' => 'pre_conference']);
                    \App\Models\SiteSetting::create(['key' => "pre_conf_speaker_{$count}_affiliation", 'value' => $affiliations[$idx] ?? '', 'group' => 'pre_conference']);
                    \App\Models\SiteSetting::create(['key' => "pre_conf_speaker_{$count}_expertise", 'value' => $expertises[$idx] ?? '', 'group' => 'pre_conference']);
                }
            }
        }

        return back()->with('success', 'Pre-Conference Settings updated successfully.');
    }

    public function mccMemorialSettings()
    {
        $settings = \App\Models\SiteSetting::where('group', 'mcc_memorial')->get();
        return view('admin.mcc_memorial.index', compact('settings'));
    }

    public function updateMccMemorialSettings(Request $request)
    {
        $settings = $request->except(['_token']);
        foreach ($settings as $key => $value) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('public/settings');
                $value = str_replace('public/', 'storage/', $path);
            }
            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? json_encode($value) : $value, 'group' => 'mcc_memorial']
            );
        }
        return back()->with('success', 'MCC Memorial Settings updated successfully.');
    }

    public function themeSettings()
    {
        $settings = \App\Models\SiteSetting::where('group', 'theme')->get();
        return view('admin.theme_settings.index', compact('settings'));
    }

    public function updateThemeSettings(Request $request)
    {
        $settings = $request->except(['_token']);
        foreach ($settings as $key => $value) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('public/settings');
                $value = str_replace('public/', 'storage/', $path);
            }
            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? json_encode($value) : $value, 'group' => 'theme']
            );
        }
        return back()->with('success', 'Theme Settings updated successfully.');
    }
}
