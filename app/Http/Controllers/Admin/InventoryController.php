<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc');

        $recordsPerPage = $request->input('records', 5);

        $cars = Inventory::orderBy('id', $sortOrder)->paginate($recordsPerPage);

        return view('admin.manage-inventory.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage-inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:135',
            'description' => 'required|string|max:450',
            'main_image' => 'required|image',
            'images' => 'nullable|array',
            'images.*' => 'string'
        ]);
    
        // Resize and store the main image
        $image = $request->file('main_image');
        $manager = new ImageManager(new Driver());
        $resized = $manager->read($image)->cover(2560, 1707);
        $encoded = $resized->toJpeg();
    
        $path = 'inventories/' . $image->hashName();
        Storage::disk('public')->put($path, $encoded);
    
        // Save to DB
        $inventory = new Inventory();
        $inventory->title = $validated['title'];
        $inventory->description = $validated['description'];
        $inventory->images = json_encode($validated['images'] ?? []);
        $inventory->main_image = $path;
        $inventory->save();
    
        return redirect()->route('admin.manage-inventory.index')->with('success', 'Car added successfully!');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Inventory::findOrFail($id);
        return view('admin.manage-inventory.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:135',
            'description' => 'required|string|max:450',
            'main_image' => 'nullable|image',
            'images' => 'nullable|array',
            'images.*' => 'string'
        ]);
    
        $car = Inventory::findOrFail($id);
    
        if ($request->hasFile('main_image')) {
            // Delete old image if exists
            if ($car->main_image && Storage::disk('public')->exists($car->main_image)) {
                Storage::disk('public')->delete($car->main_image);
            }
    
            $image = $request->file('main_image');
    
            // Resize the image to 2560x1707 using Intervention Image
            $manager = new ImageManager(new Driver());
            $resized = $manager->read($image)->cover(2560, 1707);
            $encoded = $resized->toJpeg(); // Can also use ->toWebp(), ->toPng() etc.
    
            // Save resized image
            $path = 'inventories/' . $image->hashName();
            Storage::disk('public')->put($path, $encoded);
    
            $car->main_image = $path;
        }
    
        $car->title = $validated['title'];
        $car->description = $validated['description'];
        $car->images = json_encode($validated['images'] ?? []);
        $car->save();
    
        return redirect()->route('admin.manage-inventory.index')->with('success', 'Car updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Inventory::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.manage-inventory.index')->with('success', 'Car deleted successfully.');
    }

    /**
     * Store image in the define storage path.
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
            $path = 'inventories/' . $image->hashName();
    
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
