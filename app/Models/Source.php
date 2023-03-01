<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|Link[] $links
 */
class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'name',
    ];

    /**
     * The links that are related to the source.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function links()
    {
        return $this->belongsToMany(Link::class, 'link_source', 'source_id', 'link_id');
    }
}
