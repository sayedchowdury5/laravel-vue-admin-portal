<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewShop;
use App\Http\Resources\NewShopResource;


class NewShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_shop = NewShop::orderBy('id', 'DESC')->get();
        return NewShopResource::collection($new_shop);
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
        $new_shop = new NewShop();
        $new_shop->image = $request->file('image')->store('new_shop_images');
        $new_shop->shop_name = $request->shop_name;
        $new_shop->merchant = $request->merchant;
        $new_shop->brand = $request->brand;
        $new_shop->category = $request->category;
        $new_shop->floor = $request->floor;
        $new_shop->mall = $request->mall;
        $new_shop->city = $request->city;
        $new_shop->selling_identity = $request->selling_identity;
        $new_shop->free_shipping_min_amount = $request->free_shipping_min_amount;
        $new_shop->free_shipping_for_all = $request->free_shipping_for_all;
        $new_shop->activation = $request->activation;

        if($new_shop->save()){
            return new NewShopResource($new_shop);
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
        $new_shop = NewShop::findOrFail($id);
        return new NewShopResource($new_shop);
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
        $new_shop = NewShop::findOrFail($id);
        $new_shop->shop_name = $request->shop_name;
        $new_shop->merchant = $request->merchant;
        $new_shop->brand = $request->brand;
        $new_shop->category = $request->category;
        $new_shop->floor = $request->floor;
        $new_shop->mall = $request->mall;
        $new_shop->city = $request->city;
        $new_shop->selling_identity = $request->selling_identity;
        $new_shop->free_shipping_min_amount = $request->free_shipping_min_amount;
        $new_shop->free_shipping_for_all = $request->free_shipping_for_all;
        $new_shop->activation = $request->activation;

        if($new_shop->save()){
            return new NewShopResource($new_shop);
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
