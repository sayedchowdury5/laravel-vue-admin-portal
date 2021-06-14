<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogisticCharge;
use App\Http\Resources\LogisticChargeResource;

class LogisticChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $logistic_charge = LogisticCharge::findOrFail($GUID);
        // return new LogisticChargeResource($logistic_charge);
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
        $logistic_charge = new LogisticCharge();
        $logistic_charge->GUID = $request->GUID;
        $logistic_charge->from = $request->from;
        $logistic_charge->to = $request->to;
        $logistic_charge->price = $request->price;
        $logistic_charge->weight = $request->weight;
        $logistic_charge->activation = $request->activation;

        if($logistic_charge->save()){
            return new LogisticChargeResource($logistic_charge);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($GUID)
    {
        $logistic_charge = LogisticCharge::where("GUID",$GUID)->get();
        return new LogisticChargeResource($logistic_charge);
    }

    public function all($GUID)
    {
        // $logistic_charge = LogisticCharge::findMany([$GUID]);
        // return new LogisticChargeResource($logistic_charge);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logistic_charge = LogisticCharge::findOrFail($id);
        $logistic_charge->GUID = $request->GUID;
        $logistic_charge->from = $request->from;
        $logistic_charge->to = $request->to;
        $logistic_charge->price = $request->price;
        $logistic_charge->weight = $request->weight;
        $logistic_charge->activation = $request->activation;

        if($logistic_charge->save()){
            return new LogisticChargeResource($logistic_charge);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
