<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get all capsules for the user.
     */
    public function capsules(): HasMany
    {
        return $this->hasMany(Capsule::class);
    }

    /**
     * Get user's capsule statistics.
     *
     * @return array<string, int>
     */
    public function getCapsuleStats(): array
    {
        $now = now()->setTimezone('Asia/Jakarta');

        return [
            'total' => $this->capsules()->count(),
            'locked' => $this->capsules()->where('future_time', '>', $now)->count(),
            'unlocked' => $this->capsules()->where('future_time', '<=', $now)->count(),
            'public' => $this->capsules()->where('capsule_type', 'public')->count(),
            'private' => $this->capsules()->where('capsule_type', 'private')->count(),
        ];
    }

    /**
     * Get recent capsules for dashboard.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection<int, Capsule>
     */
    public function getRecentCapsules(int $limit = 5): \Illuminate\Database\Eloquent\Collection
    {
        return $this->capsules()
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get upcoming capsules (locked and opening soon).
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection<int, Capsule>
     */
    public function getUpcomingCapsules(int $limit = 5): \Illuminate\Database\Eloquent\Collection
    {
        return $this->capsules()
            ->where('future_time', '>', now()->setTimezone('Asia/Jakarta'))
            ->orderBy('future_time', 'asc')
            ->take($limit)
            ->get();
    }

    /**
     * Get user's first name for display.
     */
    public function getFirstName(): string
    {
        return Str::before($this->name, ' ');
    }

    /**
     * Get user's avatar initials.
     */
    public function getInitials(): string
    {
        return Str::upper(Str::substr($this->name, 0, 1));
    }

    /**
     * Get user's join date in readable format.
     */
    public function getJoinDate(): string
    {
        return $this->created_at->setTimezone('Asia/Jakarta')->format('F Y');
    }

    /**
     * Get capsules that will open soon (within 7 days).
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Capsule>
     */
    public function getOpeningSoonCapsules(): \Illuminate\Database\Eloquent\Collection
    {
        $now = now()->setTimezone('Asia/Jakarta');
        $sevenDaysLater = $now->copy()->addDays(7);

        return $this->capsules()
            ->whereBetween('future_time', [$now, $sevenDaysLater])
            ->orderBy('future_time', 'asc')
            ->get();
    }

    /**
     * Check if user has any capsules opening soon.
     */
    public function hasOpeningSoonCapsules(): bool
    {
        return $this->getOpeningSoonCapsules()->isNotEmpty();
    }

    /**
     * Get user's activity summary.
     *
     * @return array<string, mixed>
     */
    public function getActivitySummary(): array
    {
        $now = now()->setTimezone('Asia/Jakarta');
        $thirtyDaysAgo = $now->copy()->subDays(30);

        return [
            'total_capsules' => $this->capsules()->count(),
            'capsules_this_month' => $this->capsules()
                ->whereBetween('created_at', [$thirtyDaysAgo, $now])
                ->count(),
            'next_unlock' => $this->capsules()
                ->where('future_time', '>', $now)
                ->orderBy('future_time', 'asc')
                ->first()?->future_time,
            'last_created' => $this->capsules()
                ->latest('created_at')
                ->first()?->created_at,
        ];
    }
}