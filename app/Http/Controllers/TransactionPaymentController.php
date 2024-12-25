<?php

namespace App\Http\Controllers;

use App\Models\TransactionPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaction.payments');
    }

    public function list(){
        $payments = TransactionPayment::latest('id')->get();

        return view('dashboard.transaction.list', compact('payments'));
    }
    
    public function edit($id){
        $payment = TransactionPayment::find($id);

        return view('dashboard.transaction.payments', compact('payment'));
    }

    public function update(Request $request, $id){
        $payment = TransactionPayment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->back()->with('success', 'Payment updated successfully!');
    }
    
    public function delete($id){
        $payment = TransactionPayment::findOrFail($id);
        $payment->delete();
        
        return redirect()->back()->with('success', 'Payment deleted successfully!');
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
            $payment = TransactionPayment::where($whereFilters)->latest('id')->get();

            return response()->json([
                'status' => 'success',
                'data' => $payment
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
        // TransactionPayment::create($request->all());
        // Validate the input data
        $validated = $request->validate([
            'payment_id' => 'required',
            'bank_rrn' => 'required',
            'customer_detail' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'created_on' => 'required',
        ]);

        // Store the payment data in the database
        TransactionPayment::create([
            'payment_id' => $request->payment_id,
            'bank_rrn' => $request->bank_rrn,
            'customer_detail' => $request->customer_detail,
            'amount' => $request->amount,
            'status' => $request->status,
            'duration' => $request->duration,
            'created_on' => $request->created_on,
        ]);
        return redirect()->back()->with('success', 'Payments added successfully!');
    }
}
