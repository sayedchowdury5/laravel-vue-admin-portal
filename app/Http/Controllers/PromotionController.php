<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Http\Resources\PromotionResource;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::orderBy('id', 'DESC')->get();
        return PromotionResource::collection($promotion);
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
        $promotion = new Promotion();
        $promotion->promotion_title = $request->promotion_title;
        $promotion->image = $request->file('image')->store('promotion_images');
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->url = $request->url;
        $promotion->merchant = $request->merchant;
        $promotion->shop = $request->shop;
        $promotion->mall = $request->mall;
        $promotion->brand = $request->brand;
        $promotion->sub_brand = $request->sub_brand;
        $promotion->promotion_by = $request->promotion_by;
        $promotion->activation = $request->activation;

        if($promotion->save()){
            return new PromotionResource($promotion);
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
        $promotion = Promotion::findOrFail($id);
        return new PromotionResource($promotion);
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
        $promotion = Promotion::findOrFail($id);
        $promotion->promotion_title = $request->promotion_title;
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->url = $request->url;
        $promotion->merchant = $request->merchant;
        $promotion->shop = $request->shop;
        $promotion->mall = $request->mall;
        $promotion->brand = $request->brand;
        $promotion->sub_brand = $request->sub_brand;
        $promotion->promotion_by = $request->promotion_by;
        $promotion->activation = $request->activation;

        if($promotion->save()){
            return new PromotionResource($promotion);
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
