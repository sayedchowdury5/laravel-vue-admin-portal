<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellingIdentity;
use App\Http\Resources\SellingIdentityResource;

class SellingIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selling_identity = SellingIdentity::orderBy('id', 'DESC')->get();
        return SellingIdentityResource::collection($selling_identity);
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
        $selling_identity = new SellingIdentity();
        $selling_identity->selling_identity = $request->selling_identity;
        $selling_identity->description = $request->description;
        $selling_identity->activation = $request->activation;

        if($selling_identity->save()){
            return new SellingIdentityResource($selling_identity);
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
        $selling_identity = SellingIdentity::findOrFail($id);
        return new SellingIdentityResource($selling_identity);
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
        $selling_identity = SellingIdentity::findOrFail($id);
        $selling_identity->selling_identity = $request->selling_identity;
        $selling_identity->description = $request->description;
        $selling_identity->activation = $request->activation;

        if($selling_identity->save()){
            return new SellingIdentityResource($selling_identity);
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
