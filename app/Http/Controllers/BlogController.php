<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description_one' => 'required|string',
            'description_two' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_gallery_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_gallery_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_gallery_three' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->description_one = $validatedData['description_one'];
        $blog->description_two = $validatedData['description_two'] ?? null;

        if ($request->hasFile('main_image')) {
            $blog->main_image = $request->file('main_image')->store('blogs', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $blog->banner_image = $request->file('banner_image')->store('blogs', 'public');
        }

        if ($request->hasFile('image_gallery_one')) {
            $blog->image_gallery_one = $request->file('image_gallery_one')->store('blogs', 'public');
        }

        if ($request->hasFile('image_gallery_two')) {
            $blog->image_gallery_two = $request->file('image_gallery_two')->store('blogs', 'public');
        }

        if ($request->hasFile('image_gallery_three')) {
            $blog->image_gallery_three = $request->file('image_gallery_three')->store('blogs', 'public');
        }

        try {
            $blog->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Blog not created. Please check the form and try again.']);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description_one' => 'required|string',
            'description_two' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_gallery_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_gallery_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_gallery_three' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $validatedData['title'];
        $blog->description_one = $validatedData['description_one'];
        $blog->description_two = $validatedData['description_two'];

        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete($blog->main_image);
            $blog->main_image = $request->file('main_image')->store('blogs', 'public');
        }

        if ($request->hasFile('banner_image')) {
            Storage::disk('public')->delete($blog->banner_image);
            $blog->banner_image = $request->file('banner_image')->store('blogs', 'public');
        }

        if ($request->hasFile('image_gallery_one')) {
            Storage::disk('public')->delete($blog->image_gallery_one);
            $blog->image_gallery_one = $request->file('image_gallery_one')->store('blogs', 'public');
        }

        if ($request->hasFile('image_gallery_two')) {
            Storage::disk('public')->delete($blog->image_gallery_two);
            $blog->image_gallery_two = $request->file('image_gallery_two')->store('blogs', 'public');
        }

        if ($request->hasFile('image_gallery_three')) {
            Storage::disk('public')->delete($blog->image_gallery_three);
            $blog->image_gallery_three = $request->file('image_gallery_three')->store('blogs', 'public');
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        Storage::disk('public')->delete($blog->main_image);
        Storage::disk('public')->delete($blog->banner_image);
        Storage::disk('public')->delete($blog->image_gallery_one);
        Storage::disk('public')->delete($blog->image_gallery_two);
        Storage::disk('public')->delete($blog->image_gallery_three);

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
