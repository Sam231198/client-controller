<?php

namespace App\Repositories;

use App\Models\Client;
use GuzzleHttp\Psr7\Request;

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

    public function create(Request $request)
    {
        try {
            return $this->client->create($request);
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            return $this->client
                ->where('id', $id)
                ->update($request);
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
