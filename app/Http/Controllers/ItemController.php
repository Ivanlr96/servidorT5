<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illumminate\View\View; 
use App\Models\Box;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index', [
            'items' => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(StoreItemRequest $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'picture' => 'required|picture|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable', 
                'box_id' => 'nullable|exists:boxes,id',
            ]);
            $item = new Item();
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->price = $request->input('price');
            $item->box_id = $request->input('box_id');
            if($request->hasFile('picture')) {
                $path = $request->file('picture')->store('public/photos');
                $validated['picture'] = $path;
            }
        
            $item->save();
        }
        catch (\Exception $e) {
            return response()->json([ $e->getMessage()], 500);
        }
    }

/*
public function store(Request $request)
{
    // dd($request->all()); esto me permite ver el array que se envia.
    $validated = $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable|max:255',
        'price' => 'nullable|numeric',
        'box_id' => 'nullable|exists:boxes,id',
        'picture ' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
    ]);

    
    if ($request->hasFile('picture')) {
        $validated['picture'] = $request->file('picture')->store('public/photos');
    }

    Item::create($validated);

    return redirect('items')->with('success', 'Item created successfully');
}
    */

    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);
            $item = Item::find($id);
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->price = $request->input('price');
            $item->save();
            return redirect()->route('items.index');
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'Error updating item'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        $item = Item::find($id);

        if(!$item){
            return response()->json(['message' => 'el item no está'], 404);
        }
        else{
            $item->delete();
            return redirect()->route('items.index')->with('success', 'El item se ha eliminado correctamente.');
        }
    }
}
