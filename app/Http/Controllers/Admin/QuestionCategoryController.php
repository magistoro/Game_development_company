<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

use App\Models\QuestionCategory;;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = QuestionCategory::all();
       return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = QuestionCategory::all();

        return view('admin.category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Generating a new file name as file extension concatenated to current time (for uniqueness) 
        $fileName = time() . '.' . $data['thumbnail']->getClientOriginalExtension();
        // moving file to public/images directory with new name
        $data['thumbnail']->move(public_path('Content/Category/thumbnails'), $fileName);



        $category = new QuestionCategory($data);
        $parent = QuestionCategory::find($data['parent_id']);

        $category->thumbnail = $fileName;
        $parent->children()->save($category); 

       
        return redirect()->route('admin.category.index')->with('success', 'Категория '.$category['name'].' успешно добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionCategory $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionCategory $category)
    {
        $categories = QuestionCategory::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, QuestionCategory $category)
    {
         // Получаем валидированные данные из формы
         $data = $request->validated(); 
 
    
         $category->update($data);
 
         return redirect()->route('admin.category.show', $category->id)->with('success', 'Категория '.$category['name'].' успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success',  'Категория '.$category['name'].' успешно удалена!');
    }
}
