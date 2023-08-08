<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'text_content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page = new Page([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'text_content' => $request->input('text_content'),
        ]);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('page_images', 'public');
            $page->featured_image = $imagePath;
        }

        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text_content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page = Page::findOrFail([
            'title' => $request->input('title'),
            'text_content' => $request->input('text_content'),
        ]);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('page_images', 'public');
            $page->featured_image = $imagePath;
        }

        $page->update();

        return redirect()->route('pages.index')->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.dynamic_show', compact('page'));
        
    }
}