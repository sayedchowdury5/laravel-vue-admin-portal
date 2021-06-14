<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::orderBy('id','DESC')->get(); 
        return AdminResource::collection($admin);
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
        $admin = new Admin();
        $admin->image = $request->file('image')->store('admin_images');
        $admin->name = $request->name;
        $admin->phone_no = $request->phone_no;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->dashboard = $request->dashboard;
        $admin->floor = $request->floor;
        $admin->merchant = $request->merchant;
        $admin->product = $request->product;
        $admin->customer = $request->customer;
        $admin->stock = $request->stock;
        $admin->voucher = $request->voucher;
        $admin->advertisement = $request->advertisement;
        $admin->promotion = $request->promotion;
        $admin->manage_admin = $request->manage_admin;
        $admin->setting = $request->setting;
        $admin->mall = $request->mall;
        $admin->sales = $request->sales;
        $admin->transaction = $request->transaction;
        $admin->reports = $request->reports;
        $admin->activation = $request->activation;

        if($admin->save()){
            return new AdminResource($admin);
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
        $admin = Admin::findOrFail($id);
        return new AdminResource($admin);
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
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->phone_no = $request->phone_no;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->dashboard = $request->dashboard;
        $admin->floor = $request->floor;
        $admin->merchant = $request->merchant;
        $admin->product = $request->product;
        $admin->customer = $request->customer;
        $admin->stock = $request->stock;
        $admin->voucher = $request->voucher;
        $admin->advertisement = $request->advertisement;
        $admin->promotion = $request->promotion;
        $admin->manage_admin = $request->manage_admin;
        $admin->setting = $request->setting;
        $admin->mall = $request->mall;
        $admin->sales = $request->sales;
        $admin->transaction = $request->transaction;
        $admin->reports = $request->reports;
        $admin->activation = $request->activation;

        if($admin->save()){
            return new AdminResource($admin);
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
