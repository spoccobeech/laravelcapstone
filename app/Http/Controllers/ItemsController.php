<?php

namespace App\Http\Controllers;
use App\BufashItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class ItemsController extends Controller
{
    public function index()
    {
        //return bufashItems::all();
        $bufashItems = Bufashitems::all();
        //return view('bufash/products/viewProducts', compact('bufashItems'));
        return Response()->json(array('data' => $bufashItems));
    }

    public function create()
    {
        return view('bufash.products.addProduct'); // correct
        // console.log(response);
    }

    public function store(Request $request)
    {
      // return view('bufash/products/viewProducts');
      $bufashItems = new BufashItems;
      $bufashItems->id = $request->id;
      $bufashItems->item_name = $request->item_name;
      $bufashItems->item_type = $request->item_type;
      $bufashItems->item_size = $request->item_size;
      $bufashItems->item_qty = $request->item_qty;
      $bufashItems->item_desc = $request->item_desc;
      $bufashItems->item_price = $request->item_price;
      $path = $request->file('item_image')->store('images');
      // return redirect('bufash/products/viewProducts');
      $bufashItems->save();
      return Response()->json($path);
      return $bufashItems->toJson();
    }

    public function show($id)
    {
        $bufashItems = bufashItems::findOrFail($id);
        // return view('bufash/products/viewProducts',compact('bufashItems'));
        return Response()->json(array('data' => $bufashItems));
    }

    public function edit($id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      // return view('bufash/products/editProducts',compact('bufashItems'));
      return Response()->json(array('data' => $bufashItems));
    }

    public function update(Request $request, $id)
    {
      // return view('bufash/products/editProducts');
      $bufashItems = BufashItems::findOrFail($id);
      $bufashItems->update($request->all());
      return redirect('/Items');
    }

    public function destroy($id)
    {
        $bufashItems = bufashItems::findOrFail($id);
        $bufashItems->delete();
        //return view('bufashaccts.allAccounts', compact('bfaccounts'));
        return redirect('/Items');
    }
}
