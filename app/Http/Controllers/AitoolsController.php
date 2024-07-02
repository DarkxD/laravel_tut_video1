<?php

namespace App\Http\Controllers;

use App\Models\Aitool;
use App\Models\Category;
use Illuminate\Http\Request;

class AitoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aitools = Aitool::all();
        return view('aitools.index', compact('aitools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('aitools.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Aitool::create($request->all());
        return redirect()->route('aitools.index')->with('success', 'Az AI eszköz sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aitool = Aitool::find($id);
        $category = Category::find($aitool->category_id);
        return view('aitools.show', compact('aitool'), compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aitool = Aitool::find($id);
        $categories = Category::all();
        return view('aitools.edit', compact('aitool'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // mentés
        $aitool = Aitool::find($id);
        $aitool->name = $request->name;
        $aitool->category_id = $request->category_id;
        $aitool->description = $request->description;
        $aitool->link = $request->link;

        if ($request->hasFreePlan == 'on')
            $aitool->hasFreePlan = 1;
        else
            $aitool->hasFreePlan = 0;
        
        $aitool->price = $request->price;

        $aitool->save();

        // átirányítás
        return redirect() -> route('aitools.index') -> with('success', 'Sikeres kategória módosítás.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
