<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    const UPDATED_AT = null;

    /**
     * Attributes of Comment which
     * can be set
     *
     * @var array
     */
    protected $fillable = [
        'author',
        'content'
    ];

    /**
     * Return relation to model which is commented
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
