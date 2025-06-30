<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GetInTouch;
use Illuminate\Http\Request;

class ManageGetInTouch extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc');

        $recordsPerPage = $request->input('records', 5);

        $getInTouches = GetInTouch::orderBy('id', $sortOrder)->paginate($recordsPerPage);

        return view('admin.manage-inquiries.getintouch', compact('getInTouches'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getInTouche = GetInTouch::findOrFail($id);

        $getInTouche->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }
}
