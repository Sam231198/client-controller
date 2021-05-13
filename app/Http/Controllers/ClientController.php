<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class ClientController extends Controller
{
    private ClientRepository $clientRep;

    public function __construct()
    {
        $this->clientRep = new ClientRepository();
    }

    public function index()
    {
        // $client = $this->clientRep->read();

        return Inertia::render('Clientlist');
    }

    public function create(Request $request)
    {
        FacadesRequest::validate([
            'full_name' => ['required', 'string'],
            'document_type' => ['required', 'string'],
            'document' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'display_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        return $this->clientRep->create($request);
    }
}
