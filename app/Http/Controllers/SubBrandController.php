<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubBrand;
use App\Http\Resources\SubBrandResource;

class SubBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_brand = SubBrand::orderBy('id', 'DESC')->get();
        return SubBrandResource::collection($sub_brand);

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
        $sub_brand = new SubBrand();
        $sub_brand->GUID = $request->GUID;
        $sub_brand->image = $request->file('image')->store('sub_brand_images');
        $sub_brand->image1 = $request->file('image1')->store('sub_brand_images');
        $sub_brand->image2 = $request->file('image2')->store('sub_brand_images');
        $sub_brand->image3 = $request->file('image3')->store('sub_brand_images');
        $sub_brand->image4 = $request->file('image4')->store('sub_brand_images');
        $sub_brand->video = $request->file('video')->store('sub_brand_videos');
        $sub_brand->category = $request->category;
        //$sub_brand->product = $request->product;
        $sub_brand->brand = $request->brand;
        $sub_brand->sub_brand = $request->sub_brand;
        //$sub_brand->merchant = $request->merchant;
        //$sub_brand->shop = $request->shop;
        $sub_brand->activation = $request->activation;

        if($sub_brand->save()){
            return new SubBrandResource($sub_brand);
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
        $sub_brand = SubBrand::findOrFail($id);
        return new SubBrandResource($sub_brand);
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
        $sub_brand = SubBrand::findOrFail($id);
        $sub_brand->category = $request->category;
        $sub_brand->product = $request->product;
        $sub_brand->brand = $request->brand;
        $sub_brand->sub_brand = $request->sub_brand;
        $sub_brand->merchant = $request->merchant;
        $sub_brand->shop = $request->shop;
        $sub_brand->activation = $request->activation;
        //$sub_brand->admin_approval = $request->admin_approval;

        if($sub_brand->save()){
            return new SubBrandResource($sub_brand);
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
