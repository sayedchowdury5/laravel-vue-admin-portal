<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Http\Resources\MerchantResource;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchant = Merchant::orderBy('id', 'DESC')->get();
        return MerchantResource::collection($merchant);
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
        $merchant = new Merchant();
        $merchant->image = $request->file('image')->store('merchant_images');
        $merchant->merchant_name = $request->merchant_name;
        $merchant->ssm_no = $request->ssm_no;
        $merchant->primary_contact_no = $request->primary_contact_no;
        $merchant->secondary_contact_no = $request->secondary_contact_no;
        $merchant->email = $request->email;
        $merchant->address = $request->address;
        $merchant->zip_code = $request->zip_code;
        $merchant->city = $request->city;
        $merchant->state = $request->state;
        $merchant->country = $request->country;
        $merchant->bank_name = $request->bank_name;
        $merchant->bank_acc_no = $request->bank_acc_no;
        $merchant->belongs_to = $request->belongs_to;
        $merchant->activation = $request->activation;

        if($merchant->save()){
            return new MerchantResource($merchant);
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
        $merchant = Merchant::findOrFail($id);
        return new MerchantResource($merchant);
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
        $merchant = Merchant::findOrFail($id);
        $merchant->merchant_name = $request->merchant_name;
        $merchant->ssm_no = $request->ssm_no;
        $merchant->primary_contact_no = $request->primary_contact_no;
        $merchant->secondary_contact_no = $request->secondary_contact_no;
        $merchant->email = $request->email;
        $merchant->address = $request->address;
        $merchant->zip_code = $request->zip_code;
        $merchant->city = $request->city;
        $merchant->state = $request->state;
        $merchant->country = $request->country;
        $merchant->bank_name = $request->bank_name;
        $merchant->bank_acc_no = $request->bank_acc_no;
        $merchant->belongs_to = $request->belongs_to;
        $merchant->activation = $request->activation;

        if($merchant->save()){
            return new MerchantResource($merchant);
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
