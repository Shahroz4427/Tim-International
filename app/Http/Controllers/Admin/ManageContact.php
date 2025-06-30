<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ManageContact extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc');

        $recordsPerPage = $request->input('records', 5);

        $contacts = Contact::orderBy('id', $sortOrder)->paginate($recordsPerPage);
        
        return view('admin.manage-inquiries.contacts', compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }
}
