<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $link_id
 * @property $parsed_at
 * @property int $status
 * @property string $content
 * @property string $error_message
 * @property string $title
 * @property string $icon
 * @property-read \Illuminate\Database\Eloquent\Collection|Link[] $links
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

    /**
     * Checks whether there are 2 equal parse results.
     *
     * @param ParseResult $first
     * @param ParseResult $second
     * @return bool true if there are 2 equal results (represent content) of 2 different ParseResult objects (represent action)
     */
    public static function isEqualResults(ParseResult $first, ParseResult $second): bool
    {
        $isEqual =
            ($first->id !== $second->id) &&
            ($first->status == $second->status) &&
            ($first->error_message == $second->error_message) &&
            ($first->title == $second->title) &&
            ($first->icon == $second->icon) &&
            ($first->content == $second->content);

        return $isEqual;
    }
}
