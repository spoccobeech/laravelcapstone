<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BufashShippingInfo;
use App\BufashItems;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{

    public function index()
    {
      //$shippingInfo = BufashShippingInfo::all();
      return view('../bufash/cart/billingAddress');
    }

    public function create()
    {
        //
    }

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
      return redirect('/Checkout');

      /*$userOrder = DB::table('bufash_items')
            ->join('bufash_shipping_infos', 'bufash_items.id', '=', 'bufash_shipping_infos.bufash_items.id')
            ->select('bufash_items.*', 'bufash_shipping_infos.Town', 'bufash_shipping_infos.Zone')
            ->get();
      return Response()->json(array('data' => $userOrder));
      */
    }

    public function show($id)
    {
      $shippingDetail = BufashShippingInfo::findOrFail($id);
      return view('../bufash/cart/checkOut', compact('shippingDetail'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
