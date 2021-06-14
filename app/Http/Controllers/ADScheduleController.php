<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ADSchedule;
use App\Http\Resources\ADScheduleResource;

class ADScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ad_schedules = ADSchedule::orderBy('id', 'DESC')->get();
        return ADScheduleResource::collection($ad_schedules);
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
        $ad_schedules = new ADSchedule();
        $ad_schedules->created_date = $request->created_date;
        $ad_schedules->ad_ID = $request->ad_ID;
        $ad_schedules->ad_name = $request->ad_name;
        $ad_schedules->ad_caption = $request->ad_caption;
        $ad_schedules->client_no = $request->client_no;
        $ad_schedules->description = $request->description;
        $ad_schedules->visual_identity = $request->visual_identity;
        $ad_schedules->start_date = $request->start_date;
        $ad_schedules->end_date = $request->end_date;
        $ad_schedules->page = $request->page;
        $ad_schedules->seconds = $request->seconds;
        $ad_schedules->rate = $request->rate;
        $ad_schedules->number_of_week = $request->number_of_week;
        $ad_schedules->slot = $request->slot;
        $ad_schedules->cost = $request->cost;
        $ad_schedules->discount = $request->discount;
        $ad_schedules->tax = $request->tax;
        $ad_schedules->total = $request->total;

        if($ad_schedules->save()){
            return new ADScheduleResource($ad_schedules);
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
        $ad_schedules = ADSchedule::findOrFail($id);
        return new ADScheduleResource($ad_schedules);
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
        $ad_schedules = ADSchedule::findOrFail($id);
        $ad_schedules->created_date = $request->created_date;
        $ad_schedules->ad_ID = $request->ad_ID;
        $ad_schedules->ad_name = $request->ad_name;
        $ad_schedules->ad_caption = $request->ad_caption;
        $ad_schedules->client_no = $request->client_no;
        $ad_schedules->description = $request->description;
        $ad_schedules->visual_identity = $request->visual_identity;
        $ad_schedules->start_date = $request->start_date;
        $ad_schedules->end_date = $request->end_date;
        $ad_schedules->page = $request->page;
        $ad_schedules->seconds = $request->seconds;
        $ad_schedules->rate = $request->rate;
        $ad_schedules->number_of_week = $request->number_of_week;
        $ad_schedules->slot = $request->slot;
        $ad_schedules->cost = $request->cost;
        $ad_schedules->discount = $request->discount;
        $ad_schedules->tax = $request->tax;
        $ad_schedules->total = $request->total;

        if($ad_schedules->save()){
            return new ADScheduleResource($ad_schedules);
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
