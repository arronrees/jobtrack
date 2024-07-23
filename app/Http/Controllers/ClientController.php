<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(40);

        return view('clients.index', ['clients' => $clients]);
    }

    public function show(Client $client)
    {
        $client->load(['jobs' => function ($query) {
            $query->with('user');
        }]);

        return view('clients.show', ['client' => $client]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'contact_name' => ['required', 'max:255'],
            'contact_telephone' => ['required', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'notes' => ['nullable'],
            'website' => ['nullable', 'url'],
            'logo' => ['nullable'],
        ]);

        $client = Client::create($validatedAttributes);

        return redirect("/clients/{$client->id}");
    }
}
