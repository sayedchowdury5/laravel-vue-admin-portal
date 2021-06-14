<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Http\Resources\VoucherResource;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = Voucher::orderBy('id','DESC')->get();
        return VoucherResource::collection($voucher);
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
        $voucher = new Voucher();
        $voucher->voucher_title = $request->voucher_title;
        $voucher->mall = $request->mall;
        $voucher->merchant = $request->merchant;
        $voucher->shop = $request->shop;
        $voucher->sub_brand = $request->sub_brand;
        $voucher->voucher_code = $request->voucher_code;
        $voucher->start_date = $request->start_date;
        $voucher->end_date = $request->end_date;
        $voucher->min_spend = $request->min_spend;
        $voucher->discount_amount = $request->discount_amount;
        $voucher->maximum_usage = $request->maximum_usage;
        $voucher->voucher_belongs_to = $request->voucher_belongs_to;

        if($voucher->save()){
            return new VoucherResource($voucher);
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
        $voucher = Voucher::findOrFail($id);
        return new VoucherResource($voucher);
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
        $voucher = Voucher::findOrFail($id);
        $voucher->voucher_title = $request->voucher_title;
        $voucher->mall = $request->mall;
        $voucher->merchant = $request->merchant;
        $voucher->shop = $request->shop;
        $voucher->sub_brand = $request->sub_brand;
        $voucher->voucher_code = $request->voucher_code;
        $voucher->start_date = $request->start_date;
        $voucher->end_date = $request->end_date;
        $voucher->min_spend = $request->min_spend;
        $voucher->discount_amount = $request->discount_amount;
        $voucher->maximum_usage = $request->maximum_usage;
        $voucher->voucher_belongs_to = $request->voucher_belongs_to;

        if($voucher->save()){
            return new VoucherResource($voucher);
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
