<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservations=Reservation::get();
        
        return view('admin.reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tables=Table::where('status', TableStatus::Available)->get();  
        return view('admin.reservation.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        //
        $table=Table::where('id',$request->table_id)->first();
        if($request->guest_number > $table['guest_number']){
            return back()->with('warning','Please Choose tables based on the guest number.');
        }
        foreach ($table->reservation as $res) {
            # code...
            if(date('Y-m-d', strtotime($res->res_date))== date('Y-m-d', strtotime($request->res_date))){
                return back()->with('warning','This table is reserved for this date.');
            }
        }
        $reservation=Reservation::create($request->validated());

        Table::find($reservation->table->id)->update(['status'=>TableStatus::Unavailable]);

        return to_route('admin.reservation.index')->with('created','Reservation Created Successfully !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
