<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sub_brand_variation;
use App\Http\Resources\SubBrandVariationResource;

class SubBrandVariationController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_brand_variation = new sub_brand_variation();
        $sub_brand_variation->GUID = $request->GUID;
        $sub_brand_variation->name = $request->name;

        if($sub_brand_variation->save()){
            return new SubBrandVariationResource($sub_brand_variation);
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
        $sub_brand_variation = sub_brand_variation::where("GUID",$GUID)->get();
        return new SubBrandVariationResource($sub_brand_variation);
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
    public function update(Request $request, $GUID)
    {
        $sub_brand_variation = sub_brand_variation::findOrFail($GUID);
        $sub_brand_variation->name = $request->name;

        if($sub_brand_variation->save()){
            return new SubBrandVariationResource($sub_brand_variation);
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
