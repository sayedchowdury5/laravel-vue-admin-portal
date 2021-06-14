<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistic;
use App\Http\Resources\LogisticResource;

class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logistic = Logistic::paginate(10);
        return LogisticResource::collection($logistic);
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
        $logistic = new Logistic();
        $logistic->GUID = $request->GUID;
        $logistic->image = $request->file('image')->store('logistic_images');
        $logistic->name = $request->name;
        $logistic->activation = $request->activation;

        if($logistic->save()){
            return new LogisticResource($logistic);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logistic = Logistic::findOrFail($id);
        return new LogisticResource($logistic);
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
        $logistic = Logistic::findOrFail($id);
        $logistic->GUID = $request->GUID;
        $logistic->image = $request->image;
        $logistic->name = $request->name;
        $logistic->activation = $request->activation;

        if($logistic->save()){
            return new LogisticResource($logistic);
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
