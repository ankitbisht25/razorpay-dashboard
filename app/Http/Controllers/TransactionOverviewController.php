<?php

namespace App\Http\Controllers;

use App\Models\TransactionOverview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaction.overview');
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
            $overview = TransactionOverview::where($whereFilters)->latest()->first();

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
        TransactionOverview::create($request->all());
        return redirect()->back()->with('success', 'Payments overview added successfully!');
    }
}
