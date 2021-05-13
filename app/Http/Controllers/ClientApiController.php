<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientApiController extends Controller
{
    private ClientRepository $clientRep;

    public function __construct()
    {
        $this->clientRep = new ClientRepository();
    }

    public function index()
    {
        $client = $this->clientRep->read();

        if (isset($client['error'])) return response()->json($client, 500);

        return response()->json($client, 201);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'document_type' => 'required|string',
            'document' => 'required|string',
            'phone' => 'required|numeric',
            'display_name' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $client = $this->clientRep->create($request);

        if (isset($client['error'])) return response()->json(json_decode($client), 500);

        return response()->json($client, 201);
    }

    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'string',
            'document_type' => 'string',
            'document' => 'string',
            'phone' => 'numeric',
            'display_name' => 'string',
            'email' => 'email:rfc,dns',
            'password' => 'string'
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $client = $this->clientRep->update($id, $request);

        if (isset($client['error'])) return response()->json(json_decode($client), 500);

        return response()->json($client, 201);
    }

    public function delete(int $id)
    {
        $client = $this->clientRep->delete($id);

        if (isset($client['error'])) return response()->json(json_decode($client), 500);

        return response()->json(['result' => $client], 201);
    }
}
