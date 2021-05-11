<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillabel = [
        'document',
        'document_type',
        'full_name',
        'display_name',
        'phone',
        'password',
        'email'
    ];
}
