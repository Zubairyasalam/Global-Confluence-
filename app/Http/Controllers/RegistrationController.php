<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationNotification;
use App\Mail\RegistrationConfirmation;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation
        $rules = [
            'reg_category' => 'required',
            'consent' => 'accepted',
            'fields' => 'required|array',
        ];

        $dynamicFields = \App\Models\RegistrationField::all();
        foreach ($dynamicFields as $field) {
            if ($field->is_required) {
                $rules['fields.' . $field->name] = 'required';
            }
        }

        $request->validate($rules);

        // 2. Calculation
        $totalAmount = (float) str_replace(',', '', $request->reg_category);
        
        $addons = $request->input('addons', []);
        foreach ($addons as $addonPrice) {
            $totalAmount += (float) str_replace(',', '', $addonPrice);
        }

        // 3. Storing
        $registration = new \App\Models\Registration();
        
        // Save the dynamic fields as JSON
        $fieldsData = $request->input('fields');

        // Handle abstract file upload
        if ($request->hasFile('abstract_file')) {
            $path = $request->file('abstract_file')->store('abstracts', 'public');
            $fieldsData['abstract_file'] = $path;
        }

        $registration->form_data = $fieldsData;
        
        $registration->name = $fieldsData['name'] ?? 'N/A';
        $registration->email = $fieldsData['email'] ?? 'N/A';
        $registration->phone = $fieldsData['phone'] ?? null;
        $registration->organization = $fieldsData['organization'] ?? null;
        $registration->interested_in = $fieldsData['interested_in'] ?? null;

        $registration->category_name = $request->input('reg_category_name', 'Registration');
        $registration->total_amount = $totalAmount;
        $registration->payment_method = 'N/A';
        $registration->addons = $addons;
        $registration->payment_status = 'completed'; // auto complete for demo purposes
        
        $registration->save();

        // 4. Send admin notification email
        try {
            Mail::to('salamzubi8@gmail.com')->send(new RegistrationNotification($registration));
        } catch (\Exception $e) {
            // Log silently, don't break user flow
        }

        // 5. Send confirmation email to registrant
        if ($registration->email && $registration->email !== 'N/A') {
            try {
                Mail::to($registration->email)->send(new RegistrationConfirmation($registration));
            } catch (\Exception $e) {
                // Log silently, don't break user flow
            }
        }

        return redirect()->back()->with('success', 'Registration completed successfully!');
    }
}
