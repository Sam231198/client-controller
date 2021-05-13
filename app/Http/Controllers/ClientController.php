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
        $client = $this->clientRep->read();

        return Inertia::render('Clientlist')->with('clients', $client);
    }

    public function updateView(int $id)
    {
        $client = $this->clientRep->clientSelect($id);

        return Inertia::render('Clintformupdate')->with('client', $client);
    }
}
