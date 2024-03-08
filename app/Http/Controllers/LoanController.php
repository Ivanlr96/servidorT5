<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use Illumminate\View\View;


use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loans.index', [
            'loans' => Loan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {

        return view('loans.create', [
            'items' => Item::all(),
            'item_id'=>Item::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreLoanRequest $request)
    // {
    //     try {
    //         $request->validate([
    //             'user_id' => 'required|exists:users,id',
    //             'item_id' => 'required|exists:items,id',
    //             'checkout_date' => 'required|date',
    //             'due_date' => 'required|date',
    //             'returned_date' => 'date|nullable',
    //         ]);
    //         $loan = new Loan();
    //         $loan->user_id = $request->input('user_id');
    //         $loan->item_id = $request->input('item_id');
    //         $loan->checkout_date = $request->input('checkout_date');
    //         $loan->due_date = $request->input('due_date');

    //         $loan->save();
    //     }
    //     catch (\Exception $e) {
    //         return response()->json([ $e->getMessage()], 500);
    //     }
    // }
    public function store(Request $request)
    {
        // Para el checkout_date cogemos la fecha de creacion del prestamo
        $request['checkout_date'] = date('Y-m-d');


        //cogemos el usuario que esta logeado
        $user = auth()->user();
        $request['user_id'] = $user->id;



        //Guarda el prestamo en la base de datos, debemos guardar el nombre del usuario que lo presta, el nombre del item y la fecha de devolucion
        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'checkout_date' => 'required',
            'due_date' => 'required',
        ]);

        //pasamos una variable que guarde el nombre del item que coincida con item_id
        $items = Item::find($request['item_id']);

        //Le pasamos los users y los items a la vista
        Loan::create($validatedData)::with('user', 'item')->get();
        return redirect()->route('loans.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show', [

            'loans' => Loan::all(),


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $loan = Loan::find($id);
        $loan->return_date = date('Y-m-d');
        $loan->save();
        return redirect()->route('loans.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
