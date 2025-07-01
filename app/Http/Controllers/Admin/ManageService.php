<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageService extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc');

        $recordsPerPage = $request->input('records', 5);

        $services = Service::orderBy('id', $sortOrder)->paginate($recordsPerPage);
        

        return view('admin.manage-service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.manage-service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'description' => 'nullable|string',

            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);
        return redirect()->route('admin.manage-service.index')->with('success', 'Service created successfully.');
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.manage-service.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'description' => 'nullable|string',
            
            'image' => 'nullable|image'
        ]);

        $service=Service::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);
        return redirect()->route('admin.manage-service.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service=Service::findOrFail($id);
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('admin.manage-service.index')->with('success', 'Service deleted successfully.');
    }
}
