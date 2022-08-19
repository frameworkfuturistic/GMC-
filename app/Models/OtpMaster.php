<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpMaster extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'mobile_no';

    protected $fillable = [
        'mobile_no',
        'otp'
    ];
}
