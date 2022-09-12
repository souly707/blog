<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'posts';
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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /** @return \Illuminate\Database\Eloquent\Relations\BelongsTo  */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /** @return \Illuminate\Database\Eloquent\Relations\HasMany  */
    public function media(): HasMany
    {
        return $this->hasMany(PostMedia::class, 'post_id', 'id');
    }
}
