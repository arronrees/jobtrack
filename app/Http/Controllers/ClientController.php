<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

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
}
