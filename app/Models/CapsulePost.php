<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapsulePost extends Model {
    use HasFactory;

    protected $fillable = [ 'title', 'text', 'image', 'user_id',  'capsule_type', 'future_time' ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function show( $id ) {
        $capsule = Capsule::findOrFail( $id );
        return response()->json( $capsule );
    }
}
