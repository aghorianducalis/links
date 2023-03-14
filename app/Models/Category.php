<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property ?int $parent_id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|Link[] $links
 * @property-read ?Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $children
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * The links that are related to the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function links()
    {
        return $this->belongsToMany(Link::class, 'category_link', 'category_id', 'link_id');
    }

    /**
     * Recursive children.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')
//            ->with('children')
            ;
    }

    /**
     * One level parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    // Recursive parents
//    public function parents()
//    {
//        return $this->belongsTo(Category::class, 'parent_id', 'id')
//            ->with('parent');
//    }
}
