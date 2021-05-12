<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    private ClientRepository $clientRep;

    public function __construct()
    {
        $this->clientRep = new ClientRepository();
    }

    public function indexCRUD()
    {
        // $client = $this->clientRep->read();

        return Inertia::render('Clientlist');
    }
}
