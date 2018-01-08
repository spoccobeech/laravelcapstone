<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BufashShippingInfo;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('../bufash/cart/billingAddress');
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
      $shippingInfo = new BufashShippingInfo;
      $shippingInfo->id = $request->id;
      $shippingInfo->HouseNo_BldgNo = $request->HouseNo_BldgNo;
      $shippingInfo->Street = $request->Street;
      $shippingInfo->Zone = $request->Zone;
      $shippingInfo->Town = $request->Town;
      $shippingInfo->State_or_Province = $request->State_or_Province;
      $shippingInfo->ZipCode = $request->ZipCode;
      $shippingInfo->Country = $request->Country;
      $shippingInfo->save();
      return Response()->json(array('data' => $shippingInfo));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
