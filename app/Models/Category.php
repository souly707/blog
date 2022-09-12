<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
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
                'source' => 'name'
            ]
        ];
    }

    /** @return \Illuminate\Database\Eloquent\Relations\HasMany  */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
