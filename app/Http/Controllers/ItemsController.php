<?php

namespace App\Http\Controllers;
use App\BufashItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class ItemsController extends Controller
{
    public function index()
    {
        //return bufashitems::all();
        // $BufashItems = bufashitems::all();
        $bufashItems = BufashItems::all();
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
      $bufashItems->item_image = $request->item_image;
      $bufashItems->save();
      // return redirect('bufash/products/viewProducts');
      return $bufashItems->toJson();
    }

    public function show($id)
    {
        $bufashItems = BufashItems::findOrFail($id);
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
    public function ProductPicture(Request $request)
      {
        if($request->hasFile('item_image'))
        {
          $bfItemPic = $request->file('item_image');
          $filename = /*time() . '.' .  */$bfItemPic->getClientOriginalName();
          Image::make($bfItemPic)->resize(250,250)->save( public_path('/ProductPics/' .$filename));
          // bufashItems::create($request->all());
          $bufashItems = new BufashItems();
          $bufashItems->item_picture = $filename;
          $bufashItems->save();
        }
      return redirect('/Items');
    }
}
