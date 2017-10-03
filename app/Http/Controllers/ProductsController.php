<?php

namespace App\Http\Controllers;
use App\Bufashproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    public function index()
    {
        //return bufashproducts::all();
        $bufashproducts = Bufashproducts::all();
        //return view('bufash/products/viewProducts', compact('bufashproducts'));
        return Response()->json(array('data' => $bufashproducts));
    }

    public function create()
    {
        return view('bufash.products.addProduct'); // correct
        // console.log(response);
    }

    public function store(Request $request)
    {
      // return view('bufash/products/viewProducts');
      $bufashproducts = new Bufashproducts;
      $bufashproducts->id = $request->id;
      $bufashproducts->prod_name = $request->prod_name;
      $bufashproducts->prod_type = $request->prod_type;
      $bufashproducts->prod_qty = $request->prod_qty;
      $bufashproducts->prod_desc = $request->prod_desc;
      $bufashproducts->prod_price = $request->prod_price;
      $bufashproducts->prod_image = $request->prod_image;
      $bufashproducts->save();
      // return redirect('bufash/products/viewProducts');
      return $bufashproducts->toJson();
    }

    public function show($id)
    {
        $bufashproducts = Bufashproducts::findOrFail($id);
        return view('bufash/products/viewProducts',compact('bufashproducts'));
    }

    public function edit($id)
    {
      $bufashproducts = Bufashproducts::findOrFail($id);
      return view('bufash/products/editProducts',compact('bufashproducts'));
    }

    public function update(Request $request, $id)
    {
      // return view('bufash/products/editProducts');
      $bufashproducts = Bufashproducts::findOrFail($id);
      $bufashproducts->update($request->all());
      return redirect('/Products');
    }

    public function destroy($id)
    {
        $bufashproducts = Bufashproducts::findOrFail($id);
        $bufashproducts->delete();
        //return view('bufashaccts.allAccounts', compact('bfaccounts'));
        return redirect('/Products');
    }
    public function ProductPicture(Request $request)
      {
      if($request->hasFile('prod_image'))
      {
        $bfProductPic = $request->file('prod_image');
        $filename = /*time() . '.' . */ $prod_image->getClientOriginalName();
        Image::make($prod_image)->resize(250,250)->save( public_path('/ProductPics/' .$filename));
        $bufashproducts = new Bufashproducts;
        $bufashproducts->prod_image = $filename;
        $bufashproducts->save();
      }
      return redirect('/Products');
      }
}
