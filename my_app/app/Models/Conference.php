<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'speakers', 'date', 'time', 'address',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'users_conferences')
            ->withTimestamps();
    }
}
