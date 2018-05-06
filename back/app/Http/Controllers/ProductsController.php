<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
      return Product::orderBy('id', 'desc')->get();
    }

    public function store( Request $request)
    {

      $product = Product::create($request->all());
      return $product;
    }

    public function destroy($id)
    {
      try{
        Product::destroy($id);
        return response([], 204);
      } catch( \Exception $e ){
        return response( ['Problem deleting'], 500 );
      }
    }
}
