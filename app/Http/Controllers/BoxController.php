<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boxes = Box::all();
        return response()->json($boxes);
    }


    public function create()
{

}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxRequest $request)
    {
        {
            try {
                $request->validate([
                    'label' => 'required',
                    'location' => 'required',
                ]);
                $box= new Box();
                $box->label = $request->input('label');
                $box->location = $request->input('location');
                $box->save();
            }
            catch (\Exception $e) {
                return response()->json(['message' => 'Error creating box'], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxRequest $request, $id)
    {
        {
            try {
                $request->validate([
                    'label' => 'required',
                    'location' => 'required',
                ]);
                $box = Box::find($id);
                $box->label = $request->input('label');
                $box->location = $request->input('location');
                $box->save();
            }
            catch (\Exception $e) {
                return response()->json(['message' => 'Error updating box'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $id)
    {
        $box = Box::find($id);

        if(!$box){
            return response()->json(['message' => 'la caja no está'], 404);
        }
        else{
            $box->delete();
            return response()->json(['message' => 'caja eliminada'], 200);
        }
    }
    }

