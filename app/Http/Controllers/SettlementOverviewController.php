<?php

namespace App\Http\Controllers;

use App\Models\SettlementOverview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettlementOverviewController extends Controller
{
    public function index(Request $request)
    {
        $clientId = $request->query('client_id');
        return view('dashboard.settlement.overview');
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
            $overview = SettlementOverview::where($whereFilters)->where('client_id', $request->client_id)->latest()->first();

            return response()->json([
                'status' => 'success',
                'data' => $overview
            ], 200);
        } catch (Exception $e) {
            Log::error('Error fetching payments: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while fetching payments'
            ], 500);
        }
    }

    public function store(Request $request){
        SettlementOverview::create($request->all());
        return redirect()->back()->with('success', 'Settlement overview added successfully!');
    }
    
    public function list(Request $request){
        $clientId = $request->query('client_id');
        $overviews = SettlementOverview::latest('id')->where('client_id', $clientId)->get();

        return view('dashboard.settlement.overview-list', compact('overviews'));
    }
    
    public function edit($id){
        $overview = SettlementOverview::find($id);

        return view('dashboard.settlement.overview', compact('overview'));
    }

    public function update(Request $request, $id){
        $overview = SettlementOverview::findOrFail($id);
        $overview->update($request->all());

        return redirect()->back()->with('success', 'Settlement updated successfully!');
    }
    
    public function delete($id){
        $overview = SettlementOverview::findOrFail($id);
        $overview->delete();
        
        return redirect()->back()->with('success', 'Settlement deleted successfully!');
    }
}
