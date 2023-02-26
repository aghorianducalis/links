<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $link_id
 * @property int $status
 * @property $parsed_at
 */
class ParseResult extends Model
{
    use HasFactory;

    protected $table = 'parse_results';

    protected $fillable = [
        'link_id',
        'status',
        'parsed_at',
    ];

    /**
     * The links that are related to the source.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function links(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
