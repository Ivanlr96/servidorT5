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

    public function index()
    {
        return view('items.index', [
            'items' => Item::all()
        ]);

    }



    public function create()
    {
        return view('items.create', ['boxes' => Box::all()]);
    }



    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
                'box_id' => 'nullable|exists:boxes,id',
            ]);



            if($request->hasFile('picture')) {
                $path = $request->file('picture')->store('public/photos');
                $validated['picture'] = $path;
            }

            Item::create($validated);
            return redirect(route('items.index'));


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


    public function edit(Item $item)
    {

        $boxes = Box::all();
        return view('items.edit', ['item' => $item], ['boxes' => $boxes]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    public function destroy(String $id)
    {
        Item::destroy($id);
        return redirect()->route('items.index');


    }
}
