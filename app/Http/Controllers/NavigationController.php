<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $data = Navigation::with('page')->get();
        return view("navigation.index", compact('data'));
    }

    public function create()
    {
        $data = Navigation::with('page')->get();
        return view("navigation.create", compact('data'));
    }

    public function store(Request $request)
    {
        $user = new Navigation();
        $user->name = $request->input('name');
        $user->page_id = $request->input('page_id');
        $user->save();
        return redirect('/dashboard');
    }

    public function show(Navigation $navigation)
    {
        return abort(403);
    }

    public function edit(string $id)
    {   
        $item = Navigation::find($id);
        $data = Page::all();
        
        return view('navigation.edit', compact('data', 'item'));

    }

    public function update(Request $req, string $id)
    {
        $user = Navigation::findOrFail($id);
        $user->name = $req->input('name');
        $user->role = $req->input('role_id');
        $user->save();
        return redirect("/dashboard");
    }

    public function destroy(string $id)
    {
        Navigation::where("id", $id)->delete();
        return redirect('/dashboard');
    }
}
