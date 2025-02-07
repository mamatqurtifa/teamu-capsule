<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Capsule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'text', 
        'image', 
        'user_id', 
        'capsule_type', 
        'future_time'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'future_time'
    ];

    // Mengubah cara penanganan future_time
    protected $casts = [
        'future_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isLocked()
    {
        return Carbon::now('Asia/Jakarta')->lt($this->future_time);
    }

    public function getStatus()
    {
        return $this->isLocked() ? 'Locked' : 'Open';
    }

    public function getStatusClass()
    {
        return $this->isLocked() 
            ? 'bg-red-100 text-red-800' 
            : 'bg-green-100 text-green-800';
    }
}