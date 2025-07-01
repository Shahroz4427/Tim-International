<?php

namespace App\Http\Controllers;

use App\Models\CarInquiry;
use App\Models\Contact;
use App\Models\GetInTouch;
use App\Models\ServiceInquiry;
use Illuminate\Http\Request;

class InquirySubmissionController extends Controller
{
    public function storeGetInTouchInquiry(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'interest' => 'required|array|min:1',
        ]);

        GetInTouch::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'interest'   => json_encode($request->interest),
        ]);

        return response()->json(['message' => 'Thank you! We have successfully received your enquiry and will be in touch shortly.']);

    }

    public function storeServiceInquiry(Request $request)
    {
        $request->validate([
            'service' => 'required|string|max:255',
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        ServiceInquiry::create($request->only(['service', 'name', 'email', 'phone', 'message']));

        return response()->json(['message' => 'Thank you! We have successfully received your enquiry and will be in touch shortly.']);

    }

    public function storeCarInquiry(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        CarInquiry::create($request->only(['title', 'name', 'email', 'phone', 'message']));

        return response()->json(['message' => 'Thank you! We have successfully received your enquiry and will be in touch shortly.']);

    }


    public function storeContactInquiry(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255', 
            'last_name' => 'required|string|max:255', 
            'email' => 'required|email|max:255',  
            'phone' => 'nullable|string|max:20',  
            'message' => 'required|string',        
        ]);

        Contact::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
        ]);

        return response()->json(['message' => 'Thank you! We have successfully received your enquiry and will be in touch shortly.']);

    }
}
