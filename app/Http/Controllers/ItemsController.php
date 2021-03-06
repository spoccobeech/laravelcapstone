<?php

namespace App\Http\Controllers;
use App\BufashItems;
// use App\BufashCart;
// use App\Http\Controllers\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Cart;
use Image;
use Illuminate\Support\Facades\DB;
use Session;

class ItemsController extends Controller
{
    public function index()
    {
      // return bufashItems::all();
       $bufashItems = BufashItems::all();
       return view('bufash/items/viewItems', compact('bufashItems'));

      // ----------- OTHER POSSIBLE OUTPUTS ----------------- //
      // return Response()->json(array('data' => $bufashItems));
      // return BufashItems::all();
      // $bufashItems = Bufashitems::findOrFail($id);
      // $results = DB::select('select * from bufash_items where id = :id', ['id' => $bufashItems->id ]);
      // return view('../bufash/items/itemInfo', compact('$results'));
    }
    public function create()
    {
      return view('bufash.items.addItem'); // correct
      // console.log(response);
    }

    public function store(Request $request)
    {
      // return view('bufash/products/viewProducts');
      $bufashItem = BufashItems::create($request->all());

      return $request->all();

      /* $bufashItems = new BufashItems;
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
      // --------------------------------------------------------------------------------
      $bufashItems->save();

      // ------------- JSON RESPONSE ---------------
      // return Response()->json();
      // return $bufashItems->toJson();
      return redirect('ItemsToShop');
      */
    }

    public function show($id)
    {
      $bufashItems = BufashItems::findOrFail($id); //bufashItems::findOrFail($id);
      // return $request->all();
      // return view('../bufash/items/viewItems' , compact('bufashItems'));
      // $images = DB::table('item_image')->whereIn('id', $bufashItems->id)->get(); // not fixed
      return Response()->json(array('data' => $bufashItems));
      // return $request->$id;
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
      // $bufashItems->delete();
      // return view('bufashaccts.allAccounts', compact('bfaccounts'));
      // return redirect('/Items');
      try {
          $bufashItems::destroy($id);
      } catch (Exception $e) {
        return response('Error' + e);
      }

    }

    public function addtoCart(Request $request, $id)
    {
      $bufashItems = BufashItems::find($id);
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new BufashCart($oldcart);
      $cart->add($bufashItems, $bufashItems->id);

      $request->session()->put('cart', $cart);
      dd($request->session()->get('cart', $cart));
      // return Response()->json();
    }

    public function getCart()
    {
      Cart::content();
      if(!Session::has('cart'))
      {
          return view('bufash.items.itemCart');
      }
      $oldcart = Session::get('cart');
      $cart = new BufashCart($oldcart);
      // return view('/itemCart', ['BufashItems' => $cart->BufashItems,  'totalPrice' => $cart->totalPrice]);
      return Response()->json();

    }
}
