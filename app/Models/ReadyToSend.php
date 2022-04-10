<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadyToSend extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'user_id'
    ];
}
