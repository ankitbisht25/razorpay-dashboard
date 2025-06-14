<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest('id')->get();
        return view('clients.list', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect()->back()->with('success', 'Client created successfully.');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.create', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.create', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $Client = Client::findOrFail($id);
        $Client->update($request->all());
        return redirect()->back()->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $Client = Client::findOrFail($id);
        $Client->delete();
        return redirect()->back()->with('success', 'Client deleted successfully.');
    }
}
