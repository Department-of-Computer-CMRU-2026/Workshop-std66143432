<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'title',
        'speaker',
        'location',
        'total_seats',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function registeredCount(): int
    {
        return $this->registrations()->count();
    }

    public function availableSeats(): int
    {
        return max(0, $this->total_seats - $this->registeredCount());
    }

    public function isFull(): bool
    {
        return $this->availableSeats() <= 0;
    }
}
