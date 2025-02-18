<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Youtube\View;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    
    public function listing(Request $request)
    {
        try {
            $whereFilters = [];
            if ($request->filters) {
                foreach ($request->filters as $key => $value) {
                    $whereFilters[] = [$key, $value];
                }
            }
            $views = View::where($whereFilters)->latest('id')->first();

            return response()->json([
                'status' => 'success',
                'data' => $views
            ], 200);
        } catch (Exception $e) {
            Log::error('Error fetching views: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while fetching views'
            ], 500);
        }
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
