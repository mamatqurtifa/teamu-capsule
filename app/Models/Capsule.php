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

    /**
    * Get the user that owns the capsule.
    */

    public function user() {
        return $this->belongsTo( User::class );
    }

    /**
    * Check if the capsule is locked.
    */

    public function isLocked() {
        return Carbon::now( 'Asia/Jakarta' )->lt( $this->future_time );
    }

    /**
    * Check if the capsule is public.
    */

    public function isPublic() {
        return $this->capsule_type === 'public';
    }

    /**
    * Get time remaining until capsule opens.
    */

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

    /**
    * Get detailed status of the capsule.
    */

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

    /**
    * Get status CSS class for styling.
    */

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

    /**
    * Scope a query to only include public capsules.
    */

    public function scopePublic( $query ) {
        return $query->where( 'capsule_type', 'public' );
    }

    /**
    * Scope a query to only include unlocked capsules.
    */

    public function scopeUnlocked( $query ) {
        return $query->where( 'future_time', '<=', Carbon::now( 'Asia/Jakarta' ) );
    }

    /**
    * Scope a query to only include locked capsules.
    */

    public function scopeLocked( $query ) {
        return $query->where( 'future_time', '>', Carbon::now( 'Asia/Jakarta' ) );
    }

    /**
    * Get formatted creation date.
    */

    public function getFormattedCreatedAt() {
        return $this->created_at->setTimezone( 'Asia/Jakarta' )->format( 'M d, Y H:i' );
    }

    /**
    * Get formatted future time.
    */

    public function getFormattedFutureTime() {
        return $this->future_time->setTimezone( 'Asia/Jakarta' )->format( 'M d, Y H:i' );
    }
}