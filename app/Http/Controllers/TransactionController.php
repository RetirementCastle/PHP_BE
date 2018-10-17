<?php

namespace retirementcastle\Http\Controllers;

use retirementcastle\Transaction;
use retirementcastle\TransactionDetail;
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
        $transaction= Transaction::all();
        return response()->json($transaction,200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if($request->isJson()){
            $data = $request->json()->all();

            $transaction = Transaction::create([
                'type_transation_id' => $data['type_transation_id'],
                'total_amount' => $data['total_amount'],
                'observation' => $data['observation'],
                'balance' => $data['balance'],
                'contact_name' => $data['contact_name'] 
            ]);

            foreach ($data['transactiondetails'] as $key => $transactiondetaildata$

            $transactiondetail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'quantity' => $transactiondetaildata['quantity'],
                'subtotal' => $transactiondetaildata['subtotal'],
            ]);
            }


            return response()->json($data,201);
        }


            return response()->json(['error' =>'Unathorized'],500);
//            $transaction = Transaction::create($request->all());

//        return response()->json($transaction, 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  \retirementcastle\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
  {
        //
         return $transaction;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \retirementcastle\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \retirementcastle\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
        //$transaction = Transaction::findOrFail($id);
        $transaction->update($request->only(['type_transation_id','balance','observation','contact_name','total_amount']));


        return response()->json($transaction,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \retirementcastle\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
        $transaction->delete();
        return response()->json(null, 204);
    }
}

