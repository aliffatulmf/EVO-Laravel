<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Transaction;
use App\Models\Admin\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only(['number']);

        $candidate = Candidate::where('number', $validated['number'])->firstOrFail();
        $user = auth()->user();

        Transaction::create([
            'user_id' => $user->id,
            'candidate_id' => $candidate->id
        ]);


        return redirect()
            ->back()
            ->with('message', sprintf('Successfully voted %s.', $candidate->name));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Admin\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
