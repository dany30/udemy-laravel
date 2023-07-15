<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Support\Js;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('title', 'ASC')->paginate(10);
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "it´s right here on create os categories!";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //este metodo array_merge se usa para agregar array puse image por poner algo
      // $data = array_merge($request->all(),['image' => 'nada']);
       //$category = Category::create($data);
       $slug = Str::slug($request->title);
        $category = Category::create(['title' => $request->title, 'slug' => $slug]);
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
       // $category = Category::findOrFail($category->id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('ok');
    }
}
