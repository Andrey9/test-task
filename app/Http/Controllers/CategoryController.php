<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('views.category.index')->with([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('views.category.create');
    }

    public function show($id)
    {
        $category = Category::with(['posts', 'comments'])->findOrFail($id);

        return view('views.category.show')->with([
            'category' => $category
        ]);
    }

    public function store(CategoryRequest $request)
    {
        try{
            $category = new Category($request->all());

            $category->save();

            return redirect()->route('category.index');
        }catch (Exception $e){
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('views.category.edit')->with([
            'category' => $category
        ]);
    }

    public function update($id, CategoryRequest $request)
    {
        try{
            $category = Category::find($id);

            $category->fill($request->all());

            $category->update();

            return redirect()->route('category.index');
        }catch (Exception $e){
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            $category = Category::findOrFail($id);

            if(!$category->delete()){

            }
        }catch (Exception $e){

        }

        return redirect()->route('category.index');
    }
}
