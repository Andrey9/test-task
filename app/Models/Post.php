<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Commentable;

    public $timestamps = false;

    /**
     * Attributes of Post which
     * can be set
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'file',
        'category_id'
    ];

    public function getShortContent()
    {
        return strlen($this->content) > 100 ? substr($this->content, 0, 100) : $this->content;
    }

    /**
     * Post - Category many-to-one relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getUrl()
    {
        return route('post.show', $this->id);
    }
}
