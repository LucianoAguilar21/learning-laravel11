<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Chirp extends Model
{
    use HasFactory, Notifiable ,HasApiTokens;
    

    protected $fillable =[
        'message',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
