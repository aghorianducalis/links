<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $url
 * @property string $title
 * @property string $icon
 * @property $added_at
 */
class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'url',
        'title',
        'icon',
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
}
