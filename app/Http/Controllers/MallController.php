<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mall;
use App\Http\Resources\MallResource;

class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mall = Mall::orderBy('id', 'DESC')->get();
        return MallResource::collection($mall);
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
        $mall = new Mall();
        $mall->image = $request->file('image')->store('mall_images');
        $mall->mall_name = $request->mall_name;
        $mall->contact_person = $request->contact_person;
        $mall->contact_number = $request->contact_number;
        $mall->email_address = $request->email_address;
        $mall->address = $request->address;
        $mall->zip_code = $request->zip_code;
        $mall->country = $request->country;
        $mall->city = $request->city;
        $mall->activation = $request->activation;

        if($mall->save()){
            return new MallResource($mall);
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
        $mall = Mall::findOrFail($id);
        return new MallResource($mall);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $mall = Mall::findOrFail($id);
        $mall->mall_name = $request->mall_name;
        $mall->contact_person = $request->contact_person;
        $mall->contact_number = $request->contact_number;
        $mall->email_address = $request->email_address;
        $mall->address = $request->address;
        $mall->zip_code = $request->zip_code;
        $mall->country = $request->country;
        $mall->city = $request->city;
        $mall->activation = $request->activation;

        if($mall->save()){
            return new MallResource($mall);
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
