<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "username",
        "ip"
    ];

    public function message() {
        return $this->hasMany(Message::class);
    }
}
