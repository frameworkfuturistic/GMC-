<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class surveyLogin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable=[
        'name',
        'email',
        'password'
    ];

    public function tokenGenerate(){
        $token = Str::random(80);
        return $token;
    }
}
