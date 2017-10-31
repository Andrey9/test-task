<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 31.10.17
 * Time: 10:44
 */

namespace App\Traits;

use App\Models\Comment;

trait Commentable
{

    /**
     * Polymorphic relation for Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}