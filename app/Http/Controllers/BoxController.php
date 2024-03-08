<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use Illuminate\Routing\ViewController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Models\Item;
class BoxController extends Controller
{
    public function index():View
    {
        return view('boxes.index', [
            'boxes' => Box::all()
        ]);
    }


    public function create()
    {
        return view('boxes.create');
    }

    public function store(Request $request)
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

    return redirect()->route('boxes.index');
            }
            catch (\Exception $e) {
                return response()->json(['message' => 'Error creating box'], 500);
            }
        }
    }


    public function show($id)
    {
        try {
            $box = Box::find($id);
            if (!$box) {
                return response()->json(['message' => 'Box not found'], 404);
            }
            return view('boxes.show', [
                'box' => $box,
                'items'=> $box->item


            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving box'], 500);
        }
    }


    public function edit(Box $box)
    {
        return view('boxes.edit', ['box' => $box]);
    }



    public function update(Request $request, $id)
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
                return redirect()->route('boxes.index');
            }
            catch (\Exception $e) {
                return response()->json(['message' => 'Error updating box'], 500);
            }
        }
    }


    public function destroy($id)
    {
        $box = Box::find($id);

        if(!$box){
            return response()->json(['message' => 'la caja no está'], 404);
        }
        else{
            $box->delete();
            return redirect()->route('boxes.index')->with('success', 'La caja se ha eliminado correctamente.');
        }
    }
    }

