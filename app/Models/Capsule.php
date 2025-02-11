<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Capsule extends Model {
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

    protected $casts = [
        'future_time' => 'datetime'
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function isLocked() {
        return Carbon::now( 'Asia/Jakarta' )->lt( $this->future_time );
    }

    public function isPublic() {
        return $this->capsule_type === 'public';
    }

    public function getTimeRemaining() {
        if ( !$this->isLocked() ) {
            return null;
        }

        $now = Carbon::now( 'Asia/Jakarta' );
        $future = $this->future_time;
        $diff = $now->diff( $future );

        if ( $diff->days > 30 ) {
            return sprintf( '%d months, %d days', floor( $diff->days / 30 ), $diff->days % 30 );
        } elseif ( $diff->days > 0 ) {
            return sprintf( '%d days, %d hours', $diff->days, $diff->h );
        } elseif ( $diff->h > 0 ) {
            return sprintf( '%d hours, %d minutes', $diff->h, $diff->i );
        } else {
            return sprintf( '%d minutes', $diff->i );
        }
    }

    public function getStatus() {
        if ( !$this->isLocked() ) {
            return 'Open';
        }

        $now = Carbon::now( 'Asia/Jakarta' );
        $diff = $now->diffInDays( $this->future_time );

        if ( $diff > 30 ) {
            return 'Locked';
        } elseif ( $diff > 7 ) {
            return 'Opening Soon';
        } else {
            return 'Opening Very Soon';
        }
    }

    public function getStatusClass() {
        $status = $this->getStatus();

        return match( $status ) {
            'Locked' => 'bg-red-100 text-red-800',
            'Opening Soon' => 'bg-yellow-100 text-yellow-800',
            'Opening Very Soon' => 'bg-yellow-400 text-yellow-900',
            'Open' => 'bg-green-100 text-green-800',
            default => 'bg-gray-100 text-gray-800'
        }
        ;
    }

    public function scopePublic( $query ) {
        return $query->where( 'capsule_type', 'public' );
    }

    public function scopeUnlocked( $query ) {
        return $query->where( 'future_time', '<=', Carbon::now( 'Asia/Jakarta' ) );
    }

    public function scopeLocked( $query ) {
        return $query->where( 'future_time', '>', Carbon::now( 'Asia/Jakarta' ) );
    }

    public function getFormattedCreatedAt() {
        return $this->created_at->setTimezone( 'Asia/Jakarta' )->format( 'M d, Y H:i' );
    }

    public function getFormattedFutureTime() {
        return $this->future_time->setTimezone( 'Asia/Jakarta' )->format( 'M d, Y H:i' );
    }
}