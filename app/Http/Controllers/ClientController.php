<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::query();

        $validSortBys = ['name', 'contact_name', 'contact_email'];
        $validSorts = ['asc', 'desc'];

        $sort = $request->query('sort');
        $sortBy = $request->query('sort_by');

        if ($sort && in_array($sort, $validSorts) && $sortBy && in_array($sortBy, $validSortBys)) {
            $clients->orderBy($sortBy, $sort);
        }

        $clients = $clients->paginate(40);

        return view('clients.index', ['clients' => $clients, 'current_sort' => $sort, 'current_sort_by' => $sortBy]);
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
            'logo' => ['nullable',  File::types(['png', 'jpg', 'webp'])->max(5 * 1024)],
        ]);

        $logo = '';

        if ($request->logo && $validatedAttributes['logo']) {
            $logo = $request->logo->store('client_logos');
        }

        $client = Client::create([...$validatedAttributes, 'logo' => $logo]);

        return redirect("/clients/{$client->id}");
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Request $request, Client $client)
    {
        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'contact_name' => ['required', 'max:255'],
            'contact_telephone' => ['required', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'notes' => ['nullable'],
            'website' => ['nullable', 'url'],
            'logo' => ['nullable',  File::types(['png', 'jpg', 'webp'])->max(5 * 1024)],
        ]);

        $client->update([
            'name' => $validatedAttributes['name'],
            'contact_name' => $validatedAttributes['contact_name'],
            'contact_telephone' => $validatedAttributes['contact_telephone'],
            'contact_email' => $validatedAttributes['contact_email'],
            'notes' => $validatedAttributes['notes'],
            'website' => $validatedAttributes['website'],
        ]);

        if ($request->logo && $validatedAttributes['logo']) {
            $logo = $request->logo->store('client_logos');

            $client->update([
                'logo' => $logo,
            ]);
        }

        return redirect("/clients/{$client->id}");
    }
}
