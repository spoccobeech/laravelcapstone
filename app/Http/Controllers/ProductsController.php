<?php

namespace App\Http\Controllers;
use App\Bufashproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return bufashproducts::all();
        $bufashproducts = Bufashproducts::all();
        return view('bufash/products/viewProducts', compact('bufashproducts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bufash.products.addProduct'); // correct
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //return view('bufash/products/viewProducts');
      $bufashproducts = new Bufashproducts;
      $bufashproducts->id = $request->id;
      $bufashproducts->prod_name = $request->prod_name;
      $bufashproducts->prod_type = $request->prod_type;
      $bufashproducts->prod_qty = $request->prod_qty;
      $bufashproducts->prod_desc = $request->prod_desc;
      $bufashproducts->prod_price = $request->prod_price;
      $bufashproducts->save();
      return redirect('bufash/products/indexProducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bufashproducts = Bufashproducts::findOrFail($id);
        return view('bufash/products/viewProducts',compact('bufashproducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $bufashproducts = Bufashproducts::findOrFail($id);
      return view('bufash/products/editProducts',compact('bufashproducts'));
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
      // return view('bufash/products/editProducts');
      $bufashproducts = Bufashproducts::findOrFail($id);
      $bufashproducts->update($request->all());
      return redirect('/Products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bufashproducts = Bufashproducts::findOrFail($id);
        $bufashproducts->delete();
        //return view('bufashaccts.allAccounts', compact('bfaccounts'));
        return redirect('/Products');
    }
}
