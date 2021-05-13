<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientRepository
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function read()
    {
        try {
            return $this->client->all();
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function client(int $id)
    {
        try {

            $result = $this->client
                ->where('id', $id)
                ->get();

            if ($result)
                return $result;
            else
                return ['erro' => 'cliente não encontrado'];
        } catch (\Exception $e) {

            return ["error" => $e->getMessage()];
        }
    }

    public function create(Request $request)
    {
        try {
            return $this->client->create($request->all());
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function update(int $id, Request $request)
    {
        try {

            $result = $this->client
                ->where('id', $id)
                ->update($request->all());

            if ($result)
                return $this->client->where('id', $id)->get();
            else
                return ['erro' => 'cliente não encontrado'];
        } catch (\Exception $e) {

            return ["error" => $e->getMessage()];
        }
    }

    public function delete(int $id)
    {
        try {
            return $this->client
                ->where('id', $id)
                ->delete();
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
