<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubBrandDetails;
use App\Http\Resources\SubBrandDetailsResource;

class SubBrandDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_brand_details = SubBrandDetails::paginate(10);
        return SubBrandDetailsResource::collection($sub_brand_details);
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
        $sub_brand_details = new SubBrandDetails();
        $sub_brand_details->GUID = $request->GUID;
        $sub_brand_details->image = $request->file('image')->store('sub_brand_details_images');
        $sub_brand_details->image1 = $request->file('image1')->store('sub_brand_details_images');
        $sub_brand_details->image2 = $request->file('image2')->store('sub_brand_details_images');
        $sub_brand_details->image3 = $request->file('image3')->store('sub_brand_details_images');
        $sub_brand_details->image4 = $request->file('image4')->store('sub_brand_details_images');
        $sub_brand_details->video = $request->file('video')->store('sub_brand_details_videos');
        $sub_brand_details->sub_brand_name = $request->sub_brand_name;
        $sub_brand_details->brand_name = $request->brand_name;
        $sub_brand_details->product_type = $request->product_type;
        $sub_brand_details->shop_name = $request->shop_name;
        $sub_brand_details->merchant = $request->merchant;
        $sub_brand_details->mall = $request->mall;
        $sub_brand_details->stock = $request->stock;
        $sub_brand_details->commission = $request->commission;
        $sub_brand_details->sst = $request->sst;
        $sub_brand_details->gst = $request->gst;
        $sub_brand_details->price = $request->price;
        $sub_brand_details->discount_price = $request->discount_price;
        $sub_brand_details->description = $request->description;
        $sub_brand_details->uom = $request->uom;
        $sub_brand_details->height = $request->height;
        $sub_brand_details->weight = $request->weight;
        $sub_brand_details->fragile = $request->fragile;
        $sub_brand_details->shipping = $request->shipping;
        $sub_brand_details->activation = $request->activation;
        //$sub_brand_details->admin_approval = $request->admin_approval;

        if($sub_brand_details->save()){
            return new SubBrandDetailsResource($sub_brand_details);
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
        $sub_brand_details = SubBrandDetails::findOrFail($id);
        return new SubBrandDetailsResource($sub_brand_details);
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
        $sub_brand_details = SubBrandDetails::findOrFail($id);
        $sub_brand_details->sub_brand_name = $request->sub_brand_name;
        $sub_brand_details->brand_name = $request->brand_name;
        $sub_brand_details->product_type = $request->product_type;
        $sub_brand_details->shop_name = $request->shop_name;
        $sub_brand_details->merchant = $request->merchant;
        $sub_brand_details->mall = $request->mall;
        $sub_brand_details->stock = $request->stock;
        $sub_brand_details->commission = $request->commission;
        $sub_brand_details->sst = $request->sst;
        $sub_brand_details->gst = $request->gst;
        $sub_brand_details->price = $request->price;
        $sub_brand_details->discount_price = $request->discount_price;
        $sub_brand_details->description = $request->description;
        $sub_brand_details->uom = $request->uom;
        $sub_brand_details->height = $request->height;
        $sub_brand_details->weight = $request->weight;
        $sub_brand_details->fragile = $request->fragile;
        $sub_brand_details->shipping = $request->shipping;
        $sub_brand_details->activation = $request->activation;
        $sub_brand_details->admin_approval = $request->admin_approval;

        if($sub_brand_details->save()){
            return new SubBrandDetailsResource($sub_brand_details);
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
