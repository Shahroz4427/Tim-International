<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class ManageGallery extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $gallery = Gallery::findOrFail($id);
        return view('admin.manage-gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'long_description' => 'required|string|max:2000',
            'short_description' => 'required|string|max:512',
            'images' => 'nullable|array',
            'images.*' => 'string'
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->long_description = $validated['long_description'];
        $gallery->short_description = $validated['short_description'];
        $gallery->images = json_encode($validated['images'] ?? []);
        $gallery->save();

        return redirect()->back()->with('success', 'Gallery updated successfully.');
    }

    /**
     * Store and resize image in the define storage path.
     */
    public function uploadImage(Request $request) 
    { 
        if ($request->hasFile('file')) {
    
            $image = $request->file('file');
    
            // Create ImageManager with GD driver (or 'imagick' if installed)
            $manager = new ImageManager(new Driver());
    
            // Resize image to 2560x1707
            $resized = $manager->read($image)->cover(2560, 1707);
    
            // Encode image to binary (e.g., jpeg or original extension)
            $encoded = $resized->toJpeg(); // or ->toWebp(), ->toPng(), etc.
    
            // Generate file path
            $path = 'galleries/' . $image->hashName();
    
            // Store image
            Storage::disk('public')->put($path, $encoded);
    
            return response()->json(['filepath' => $path]);
        }
    
        return response()->json(['error' => 'No file uploaded'], 400);
    }

    /**
     * Remove image from the define storage path.
     */
    public function deleteImage(Request $request)
    {
        $filePath = $request->input('filePath');

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }
}
