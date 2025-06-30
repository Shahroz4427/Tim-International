<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarInquiry;
use Illuminate\Http\Request;

class ManageCarInquiry extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc');

        $recordsPerPage = $request->input('records', 5);

        $carInquiries = CarInquiry::orderBy('id', $sortOrder)->paginate($recordsPerPage);

        return view('admin.manage-inquiries.carinquiry', compact('carInquiries'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inquiry = CarInquiry::findOrFail($id);

        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }
}
