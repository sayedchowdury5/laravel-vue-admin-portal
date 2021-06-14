<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsedShop;
use App\Http\Resources\UsedShopResource;

class UsedShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $used_shop = UsedShop::orderBy('id','DESC')->get();
        return UsedShopResource::collection($used_shop);
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
        $used_shop = new UsedShop();
        $used_shop->image = $request->file('image')->store('used_shop_images');
        $used_shop->client_name = $request->client_name;
        $used_shop->merchant = $request->merchant;
        $used_shop->brand = $request->brand;
        $used_shop->category = $request->category;
        $used_shop->floor = $request->floor;
        $used_shop->mall = $request->mall;
        $used_shop->selling_identity = $request->selling_identity;
        $used_shop->free_shipping_min_amount = $request->free_shipping_min_amount;
        $used_shop->free_shipping_for_all = $request->free_shipping_for_all;
        $used_shop->activation = $request->activation;


        if($used_shop->save()){
            return new UsedShopResource($used_shop);
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
        $used_shop = UsedShop::findOrFail($id);
        return new UsedShopResource($used_shop);
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
        $used_shop = UsedShop::findOrFail($id);
        $used_shop->client_name = $request->client_name;
        $used_shop->merchant = $request->merchant;
        $used_shop->brand = $request->brand;
        $used_shop->category = $request->category;
        $used_shop->floor = $request->floor;
        $used_shop->mall = $request->mall;
        $used_shop->selling_identity = $request->selling_identity;
        $used_shop->free_shipping_min_amount = $request->free_shipping_min_amount;
        $used_shop->free_shipping_for_all = $request->free_shipping_for_all;
        $used_shop->activation = $request->activation;

        if($used_shop->save()){
            return new UsedShopResource($used_shop);
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
