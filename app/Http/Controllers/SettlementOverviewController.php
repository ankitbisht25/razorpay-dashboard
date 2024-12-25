<?php

namespace App\Http\Controllers;

use App\Models\SettlementOverview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettlementOverviewController extends Controller
{
    public function index()
    {
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
            $overview = SettlementOverview::where($whereFilters)->latest()->first();

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
}
