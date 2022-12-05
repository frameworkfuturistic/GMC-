<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcDetail extends Model
{
    use HasFactory;

    // Get All TC Details
    public function get()
    {
        return TcDetail::all();
    }
}
