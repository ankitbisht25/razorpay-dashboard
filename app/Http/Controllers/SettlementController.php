<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettlementController extends Controller
{
    public function index()
    {
        return view('dashboard.settlement.payments');
    }

    public function list(Request $request){
        $clientId = $request->query('client_id');
        $payments = Settlement::latest('id')->where('client_id', $clientId)->get();

        return view('dashboard.settlement.list', compact('payments'));
    }
    
    public function edit($id){
        $payment = Settlement::find($id);

        return view('dashboard.settlement.payments', compact('payment'));
    }

    public function update(Request $request, $id){
        $payment = Settlement::findOrFail($id);
        $payment->update($request->all());

        return redirect()->back()->with('success', 'Settlement updated successfully!');
    }
    
    public function delete($id){
        $payment = Settlement::findOrFail($id);
        $payment->delete();
        
        return redirect()->back()->with('success', 'Settlement deleted successfully!');
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
            $settlement = Settlement::where($whereFilters)->where('client_id', $request->client_id)->latest('id')->get();

            return response()->json([
                'status' => 'success',
                'data' => $settlement
            ], 200);
        } catch (Exception $e) {
            Log::error('Error fetching payments: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while fetching payments'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        Settlement::create($request->all());
        return redirect()->back()->with('success', 'Settlement added successfully!');
    }
}
