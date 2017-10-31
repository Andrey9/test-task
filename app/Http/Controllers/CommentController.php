<?php

namespace App\Http\Controllers;

use App\Exceptions\ClassNotExistExcemption;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {
        $model = 'App\Models\\'.studly_case($request->get('commentable_type'));

        if(!class_exists($model)){
            throw new ClassNotExistExcemption('Commentable class not exist');
        }

        $model = $model::findOrFail($request->get('commentable_id'));

        $comment = new Comment($request->all());

        $model->comments()->save($comment);

        return [
            'status'  => 'success',
            'comment' => view('views.comment.index')->with(['comment' => $comment])->render()
        ];
    }

}
