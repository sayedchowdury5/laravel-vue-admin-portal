<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherMall;
use App\Http\Resources\OtherMallResource;

class OtherMallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $other_mall = OtherMall::orderBy('id','DESC')->get();
      return OtherMallResource::collection($other_mall);
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
          $other_mall = new OtherMall();
          $other_mall->image = $request->file('image')->store('other_mall');
          $other_mall->shop_name = $request->shop_name;
          $other_mall->merchant = $request->merchant;
          $other_mall->brand = $request->brand;
          $other_mall->category = $request->category;
          $other_mall->floor = $request->floor;
          $other_mall->mall = $request->mall;
          $other_mall->city = $request->city;
          $other_mall->selling_identity = $request->selling_identity;
          $other_mall->free_shipping_min_amount = $request->free_shipping_min_amount;
          $other_mall->free_shipping_for_all = $request->free_shipping_for_all;
          $other_mall->activation = $request->activation;

          if($other_mall->save()){
              return new OtherMallResource($other_mall);
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
       $other_mall = OtherMall::findOrFail($id);
       return new OtherMallResource($other_mall);
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
        $other_mall = OtherMall::findOrFail($id);
        $other_mall->shop_name = $request->shop_name;
        $other_mall->merchant = $request->merchant;
        $other_mall->brand = $request->brand;
        $other_mall->category = $request->category;
        $other_mall->floor = $request->floor;
        $other_mall->mall = $request->mall;
        $other_mall->city = $request->city;
        $other_mall->selling_identity = $request->selling_identity;
        $other_mall->free_shipping_min_amount = $request->free_shipping_min_amount;
        $other_mall->free_shipping_for_all = $request->free_shipping_for_all;
        $other_mall->activation = $request->activation;

        if($other_mall->save()){
            return new OtherMallResource($other_mall);
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
