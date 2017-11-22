<?php

namespace App\Http\Controllers;
use App\BufashItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Image;
use Illuminate\Support\Facades\DB;


class ItemsController extends Controller
{
    public function index()
    {
      // return bufashItems::all();
      $bufashItems = Bufashitems::all();
      return view('bufash/items/viewItems', compact('bufashItems'));

      // ----------- OTHER POSSIBLE OUTPUTS ----------------- //
      // return Response()->json(array('data' => $bufashItems));
      // $bufashItems = Bufashitems::findOrFail($id);
      // $results = DB::select('select * from bufash_items where id = :id', ['id' => $bufashItems->id ]);
      // return view('../bufash/items/itemDetails', compact('$results'));
    }
    public function create()
    {
      return view('bufash.items.addItem'); // correct
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

      // ------- CREATE A NEW DIRECTORY ----------
      // $newFolder = 'itemImg_ ' .  $request->id;
      // $imgDir = '/images/ ' . $newFolder;
      // Storage::makeDirectory($imgDir, 755, true ); // create directory
      // -----------------------------------------

      // $path = $request->file('item_image')->store('images');
      // --------- SAVE IMAGE TO RESOURCE FOLDER AND SAVE PATH TO LOCAL DB --------------
       if ($request->file('item_image')->isValid()){
        $imagePath = $request->file('item_image')->store('public');
        $image = Image::make(Storage::get($imagePath))->resize(400,400)->encode();
        Storage::put($imagePath,$image);

        $imagePath = explode('/',$imagePath);
        $imagePath = $imagePath[1];

        $bufashItems->item_image = $imagePath;
        }

        // return $images->toJson();
        // -------------------------------------------------------------------------------
      $bufashItems->save();

      // ------------- JSON RESPONSE ---------------
      // return Response()->json();
      // return $bufashItems->toJson();
      return redirect('ItemsToShop');
    }

    public function show($id)
    {
      $bufashItems = bufashItems::findOrFail($id);
      return view('../bufash/items/viewItems' , compact('bufashItems'));
      // $images = DB::table('item_image')->whereIn('id', $bufashItems->id)->get(); // not fixed
      // return Response()->json(array('data' => $bufashItems));
    }

    public function edit($id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      return view('../bufash/items/editItem',compact('bufashItems'));
      // return Response()->json(array('data' => $bufashItems));
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
      $bufashItems = BufashItems::findOrFail($id);
      $bufashItems->delete();
      //return view('bufashaccts.allAccounts', compact('bfaccounts'));
      return redirect('/Items');
    }

     public function showImage(Request $request)
    {
      $bufashItems = BufashItems::with('item_image')->get();
      return view('ItemstoShop')->with(['itemImage' => $bufashItems]);
    }

}
