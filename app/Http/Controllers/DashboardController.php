<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard.create');
    }

    public function list(){
        $payments = Dashboard::latest('id')->get();

        return view('dashboard.dashboard.list', compact('payments'));
    }
    
    public function edit($id){
        $dashboard = Dashboard::find($id);

        return view('dashboard.dashboard.create', compact('dashboard'));
    }

    public function update(Request $request, $id){
        $dashboard = Dashboard::findOrFail($id);
        $dashboard->update($request->all());

        return redirect()->back()->with('success', 'Dashboard data updated successfully!');
    }
    
    public function delete($id){
        $dashboard = Dashboard::findOrFail($id);
        $dashboard->delete();
        
        return redirect()->back()->with('success', 'Dashboard data deleted successfully!');
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
            $settlement = Dashboard::where($whereFilters)->latest('id')->first();

            return response()->json([
                'status' => 'success',
                'data' => $settlement
            ], 200);
        } catch (Exception $e) {
            Log::error('Error fetching dashboard data: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while fetching dashboard data'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        Dashboard::create($request->all());
        return redirect()->back()->with('success', 'Dashboard data added successfully!');
    }
}
