<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubBrandDetailVariation;
use App\Http\Resources\SubBrandDetailVariationResource;

class SubBrandDetailVariationController extends Controller
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
        $sub_brand_detail_variation = new SubBrandDetailVariation();
        $sub_brand_detail_variation->GUID = $request->GUID;
        $sub_brand_detail_variation->variation = $request->variation;
        $sub_brand_detail_variation->attribute = $request->attribute;
        $sub_brand_detail_variation->surcharge = $request->surcharge;
        $sub_brand_detail_variation->stock = $request->stock;

        if($sub_brand_detail_variation->save()){
            return new SubBrandDetailVariationResource($sub_brand_detail_variation);
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
        $sub_brand_detail_variation = SubBrandDetailVariation::where("GUID",$GUID)->get();
        return new SubBrandDetailVariationResource($sub_brand_detail_variation);
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
        //
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
