<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = booking::all();
        if ($data) {
            return ApiFormatter::CreateApi(200, "Success", $data);
        } else {
            return ApiFormatter::CreateApi(400, "Failed");
        }
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
        try {
            $request->validate([
                'customer_name' => 'required',
                'hotel_id' => 'required',
                'order_date' => 'required',
                'order_end' => 'required'
            ]);
            $booking = booking::create([
                'customer_name' => $request->customer_name,
                'hotel_id' => $request->hotel_id,
                'order_date' => $request->order_date,
                'order_end' => $request->order_end
            ]);
            $data = booking::where('id', '=', $booking->id)->get();
            if ($data) {
                return ApiFormatter::CreateApi(200, "Success", $data);
            } else {
                return ApiFormatter::CreateApi(400, "Failed");
            }
        } catch (exception $exception) {
            return ApiFormatter::CreateApi(400, "Failed");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = booking::where('id', '=', $id)->get();
        if ($data) {
            return ApiFormatter::CreateApi(200, "Success", $data);
        } else {
            return ApiFormatter::CreateApi(400, "Failed");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'customer_name' => 'required',
                'hotel_id' => 'required',
                'order_date' => 'required',
                'order_end' => 'required'
            ]);
            $booking = booking::findOrFail($id);
            $booking->update([
                'customer_name' => $request->customer_name,
                'hotel_id' => $request->hotel_id,
                'order_date' => $request->order_date,
                'order_end' => $request->order_end
            ]);
            $data = booking::where('id', '=', $booking->id)->get();
            return ApiFormatter::CreateApi(200, "Success", $data);
        } catch (Exception $th) {
            return ApiFormatter::CreateApi(400, "Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = booking::find($id);


        if ($booking) {
            $booking->delete();
            return ApiFormatter::CreateApi(200, "Success deleting data");
        } else {
            return ApiFormatter::CreateApi(400, "Cannot find data");
        }
    }
}
