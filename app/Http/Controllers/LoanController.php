<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use Illuminate\Http\Request;
use App\Models\Item;

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
    public function create()
    {
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'item_id' => 'required|exists:items,id',
                'checkout_date' => 'required|date',
                'due_date' => 'required|date',
                'returned_date' => 'date|nullable',
            ]);
            $loan = new Loan();
            $loan->user_id = $request->input('user_id');
            $loan->item_id = $request->input('item_id');
            $loan->checkout_date = $request->input('checkout_date');
            $loan->due_date = $request->input('due_date');
            $loan->returned_date = $request->input('returned_date');
        
            $loan->save();
        }
        catch (\Exception $e) {
            return response()->json([ $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
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
