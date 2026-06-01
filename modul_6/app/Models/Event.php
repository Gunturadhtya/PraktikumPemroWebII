<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_path',
        'title',
        'description',
        'url',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'experiences')
                    ->withTimestamps()
                    ->withPivot('id');
    }
}