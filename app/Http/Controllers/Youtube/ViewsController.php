<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Youtube\View;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {
        $views = View::latest('id')->get();
        return view('youtube.views.list', compact('views'));
    }

    public function create()
    {
        return view('youtube.views.create');
    }

    public function store(Request $request)
    {
        View::create($request->all());
        return redirect()->back()->with('success', 'View created successfully.');
    }

    public function show($id)
    {
        $view = View::find($id);
        return view('youtube.views.create', compact('view'));
    }

    public function edit($id)
    {
        $view = View::find($id);
        return view('youtube.views.create', compact('view'));
    }

    public function update(Request $request, $id)
    {
        $View = View::findOrFail($id);
        $View->update($request->all());
        return redirect()->back()->with('success', 'View updated successfully.');
    }

    public function destroy($id)
    {
        $View = View::findOrFail($id);
        $View->delete();
        return redirect()->back()->with('success', 'View deleted successfully.');
    }
}
