<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('views.post.create')->with([
            'categories' => $this->getCategories()
        ]);
    }

    public function show($id)
    {
        $post = Post::with(['comments'])->findOrFail($id);

        return view('views.post.show')->with([
            'post' => $post
        ]);
    }

    public function store(PostRequest $request)
    {
        try{
            $post = new Post($request->all());

            $this->processFile($post);

            $post->save();

            return redirect()->to($post->category->getUrl());
        }catch (Exception $e){
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('views.post.edit')->with([
            'post' => $post,
            'categories' => $this->getCategories()
        ]);
    }

    public function update($id, PostRequest $request)
    {
        try{
            $post = Post::find($id);

            $post->fill($request->all());

            $this->processFile($post);

            $post->update();

            return redirect()->to($post->category->getUrl());
        }catch (Exception $e){
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            $post = Post::findOrFail($id);

            if(!$post->delete()){

            }
        }catch (Exception $e){

        }

        return redirect()->route('post.index');
    }

    private function getCategories()
    {
        $categories = Category::pluck('name', 'id');

        return $categories;
    }

    private function processFile($model)
    {
        if (request()->hasFile('file')) {
            $file = request()->file('file');

            try {

                $model->file = $this->upload($file);

                return true;
            } catch (Exception $e) {

            }
        }

        return false;
    }

    private function upload($file)
    {
        if ($file) {
            $filename = md5(microtime(true).$file->getClientOriginalName()).".".strtolower(
                    $file->getClientOriginalExtension()
                );

            $dir = substr($filename, 0, 2).'/'.substr($filename, 2, 2);;

            $destination = public_path().'/files/'.$dir;
            $path = '/files/'.$dir.'/'.$filename;

            $uploaded = $file->move($destination, $filename);

            if ($uploaded) {
                return $path;
            }
        }
    }
}
