<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $link_id
 * @property $parsed_at
 * @property int $status
 * @property string $content
 * @property string $error_message
 * @property string $title
 * @property string $icon
 */
class ParseResult extends Model
{
    use HasFactory;

    protected $table = 'parse_results';

    protected $fillable = [
        'link_id',
        'parsed_at',
        'status',
        'content',
        'error_message',
        'title',
        'icon',
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
