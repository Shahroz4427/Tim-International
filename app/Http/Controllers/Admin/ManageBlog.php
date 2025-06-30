<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageBlog extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc');

        $recordsPerPage = $request->input('records', 5);

        $blogs = Blog::orderBy('id', $sortOrder)->paginate($recordsPerPage);

        return view('admin.manage-blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage-blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable',
        ]);

        $path = $request->file('image')->store('blogs', 'public');

        Blog::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $path,
        ]);

        return redirect()->route('admin.manage-blog.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $manage_blog = Blog::findOrFail($id);
        return view('admin.manage-blog.edit', ['blog' => $manage_blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable',
        ]);

        $manage_blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($manage_blog->image && Storage::disk('public')->exists($manage_blog->image)) {
                Storage::disk('public')->delete($manage_blog->image);
            }
            $path = $request->file('image')->store('blogs', 'public');
            $manage_blog->image = $path;
        }

        $manage_blog->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $manage_blog->image,
        ]);

        return redirect()->route('admin.manage-blog.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manage_blog = Blog::findOrFail($id);

        if ($manage_blog->image && Storage::disk('public')->exists($manage_blog->image)) {
            Storage::disk('public')->delete($manage_blog->image);
        }

        $manage_blog->delete();

        return redirect()->route('admin.manage-blog.index')->with('success', 'Blog deleted successfully.');
    }
}
