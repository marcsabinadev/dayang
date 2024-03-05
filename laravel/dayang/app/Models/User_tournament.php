<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tournament_id'
    ];
    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

}
