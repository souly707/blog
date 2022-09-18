<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    /**
     * sluggable configuration.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /** @return \Illuminate\Database\Eloquent\Relations\BelongsTo  */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /** @return \Illuminate\Database\Eloquent\Relations\BelongsTo  */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return \Illuminate\Database\Eloquent\Relations\HasMany  */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /** @return \Illuminate\Database\Eloquent\Relations\HasMany  */
    public function approved_comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereStatus(1);
    }

    /** @return \Illuminate\Database\Eloquent\Relations\HasMany  */
    public function media(): HasMany
    {
        return $this->hasMany(PostMedia::class);
    }
}
