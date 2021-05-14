<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = 0;
        while ($a <= 10) {
            $user = Client::create(
                [
                    'full_name' => Str::random(10),
                    'document' => 'RG',
                    'document_type' => mt_rand(1000000, 9999999),
                    'display_name' =>  Str::random(5),
                    'phone' => mt_rand(10000000000, 99999999999),
                    'email' =>  Str::random(10) . '@email.com',
                    'password' => Hash::make('password'),
                ]
            );
    
            $user->product()->create([
                'name' => Str::random(10),
                'description'=> Str::random(100),
                'price' => mt_rand(1, 100),
                'sku'=> Str::random(10),
                'stock_amount' => mt_rand(1, 100),
                'client_id' => mt_rand(1, 10)
            ]);

            $a++;
        }
    }
}
