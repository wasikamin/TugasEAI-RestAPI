<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\jenis_pengiriman;
use App\Http\Requests\Storejenis_pengirimanRequest;
use App\Http\Requests\Updatejenis_pengirimanRequest;

class JenisPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = jenis_pengiriman::all();
        if ($data) {
            return ApiFormatter::CreateApi(200, "Success", $data);
        } else {
            return ApiFormatter::CreateApi(400, "Failed");
        };
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
     * @param  \App\Http\Requests\Storejenis_pengirimanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storejenis_pengirimanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenis_pengiriman  $jenis_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = jenis_pengiriman::where('id', '=', $id)->get();
        if ($data) {
            return ApiFormatter::CreateApi(200, "Success", $data);
        } else {
            return ApiFormatter::CreateApi(400, "Failed");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenis_pengiriman  $jenis_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(jenis_pengiriman $jenis_pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatejenis_pengirimanRequest  $request
     * @param  \App\Models\jenis_pengiriman  $jenis_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Updatejenis_pengirimanRequest $request, jenis_pengiriman $jenis_pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenis_pengiriman  $jenis_pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenis_pengiriman $jenis_pengiriman)
    {
        //
    }
}
