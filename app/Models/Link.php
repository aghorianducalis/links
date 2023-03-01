<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $url
 * @property $added_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|Source[] $sources
 * @property-read \Illuminate\Database\Eloquent\Collection|ParseResult[] $parseResults
 */
class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'url',
        'added_at',
    ];

    /**
     * The categories that are related to the link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_link', 'link_id', 'category_id');
    }

    /**
     * The sources that are related to the link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sources()
    {
        return $this->belongsToMany(Source::class, 'link_source', 'link_id', 'source_id');
    }

    /**
     * The parse result objects that are related to the link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parseResults(): HasMany
    {
        return $this->hasMany(ParseResult::class);
    }
}
