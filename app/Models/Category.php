<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Commentable;

    public $timestamps = false;

    /**
     * Attributes of Category which
     * can be set
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];


    /**
     * Category - Post one-to-many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function getUrl()
    {
        return route('category.show', $this->id);
    }
}
