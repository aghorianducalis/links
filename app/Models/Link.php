<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $content_type_id
 * @property int $domain_id
 * @property string $url
 * @property $added_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|Source[] $sources
 * @property-read \Illuminate\Database\Eloquent\Collection|ParseResult[] $parseResults
 * @property-read ContentType $contentType
 * @property-read Domain $domain
 */
class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'url',
        'added_at',
        'content_type_id',
        'domain_id',
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

    /**
     * The content type that are related to the link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contentType(): BelongsTo
    {
        return $this->belongsTo(ContentType::class);
    }

    /**
     * The domain that are related to the link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }
}
