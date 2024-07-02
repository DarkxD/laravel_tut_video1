<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // mentés
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        // átirányítás
        return redirect() -> route('categories.index') -> with('success', 'Sikeres kategória létrehozás.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // mentés
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        // átirányítás
        return redirect() -> route('categories.index') -> with('success', 'Sikeres kategória módosítás.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $name_s = $category->name;
        $id_s = $id;
        $category->delete();

        return redirect() -> route('categories.index') -> with('success', 'Kategória törölve lett: id '.$id.', név '.$name_s);
    }
}
