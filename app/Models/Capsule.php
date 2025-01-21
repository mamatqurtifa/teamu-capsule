<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capsule extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'image', 'user_id', 'capsule_type', 'future_time']; // Tambahkan capsule_type

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
