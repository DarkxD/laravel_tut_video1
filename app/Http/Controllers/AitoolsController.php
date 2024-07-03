<?php

namespace App\Http\Controllers;

use App\Models\Aitool;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class AitoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query('sort_by', 'id');
        $sort_dir = request()->query('sort_dir', 'asc');

        //$aitools = Aitool::with('tags')->orderBy($sort_by, $sort_dir)->get(); // az összes találatot megjelenítette
        $aitools = Aitool::with('tags')->orderBy($sort_by, $sort_dir)->paginate(5); // csak 5 öt jelenít meg
        return view('aitools.index', compact('aitools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('aitools.create', compact('categories'), compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aitool = Aitool::create($request->all());
        $aitool->tags()->attach( $request->tags); // Attach tags to the AI tool (many-to-many relationship)

        return redirect()->route('aitools.index')->with('success', 'Az AI eszköz sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aitool = Aitool::with('tags')->find($id);
        $category = Category::find($aitool->category_id);
        return view('aitools.show', compact('aitool'), compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aitool = Aitool::with('tags')->find($id);
        $aitool->tags()->attach( $aitool->tags);

        $categories = Category::all();
        return view('aitools.edit', compact('aitool'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // mentés
        $aitool = Aitool::with('tags')->find($id);
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
        $aitool = Aitool::find($id);
        $name_s = $aitool->name;
        $id_s = $id;
        $aitool->delete();

        return redirect() -> route('aitools.index') -> with('success', 'AI tool törölve lett: id '.$id.', név '.$name_s);
    }
}
