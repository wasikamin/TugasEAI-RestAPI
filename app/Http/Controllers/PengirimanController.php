<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use exception;
use App\Helpers\ApiFormatter;
use App\Models\pengiriman;
use App\Http\Requests\StorepengirimanRequest;
use App\Http\Requests\UpdatepengirimanRequest;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pengiriman::all();
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
     * @param  \App\Http\Requests\StorepengirimanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepengirimanRequest $request)
    {
        try {
            $request->validate([
                'customer_id' => 'required',
                'jenis_pengiriman_id' => 'required',
                'jenis_barang' => 'required',
                'berat' => 'required',
                'tujuan' => 'required'
            ]);
            $pengiriman = pengiriman::create([
                'customer_id' => $request->customer_id,
                'jenis_pengiriman_id' => $request->jenis_pengiriman_id,
                'jenis_barang' => $request->jenis_barang,
                'berat' => $request->berat,
                'tujuan' => $request->tujuan
            ]);
            $data = pengiriman::where('id', '=', $pengiriman->id)->get();
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
     * @param  \App\Models\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pengiriman::where('id', '=', $id)->get();
        if ($data) {
            return ApiFormatter::CreateApi(200, "Success", $data);
        } else {
            return ApiFormatter::CreateApi(400, "Failed");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepengirimanRequest  $request
     * @param  \App\Models\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'customer_id' => 'required',
                'jenis_pengiriman_id' => 'required',
                'jenis_barang' => 'required',
                'berat' => 'required',
                'tujuan' => 'required'
            ]);
            $pengiriman = pengiriman::findOrFail($id);
            $pengiriman = pengiriman::create([
                'customer_id' => $request->customer_id,
                'jenis_pengiriman_id' => $request->jenis_pengiriman_id,
                'jenis_barang' => $request->jenis_barang,
                'berat' => $request->berat,
                'tujuan' => $request->tujuan
            ]);
            $data = pengiriman::where('id', '=', $pengiriman->id)->get();
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengiriman = pengiriman::find($id);


        if ($pengiriman) {
            $pengiriman->delete();
            return ApiFormatter::CreateApi(200, "Success deleting data");
        } else {
            return ApiFormatter::CreateApi(400, "Cannot find data");
        }
    }
}
