<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        if(!$products){
            return response()->json(['message'=>"Product not found."], 404);
        }
        return $products;
    }

    public function show($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json(['message'=>"Product not found."], 404);
        }
        return $product;
    }

    public function store(Request $request){
        $product = Product::create($request->all());

        return response()->json(['message' => 'Product added successfully']);
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        if(!$product){
            return response()->json(['message'=>"Product not found."], 404);
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        Product::where('id', $id)->update($request->all());

        return response()->json(['message' => 'Product updated successfully']);

    }

    public function destroy($id){
        Product::destroy($id);
        return response()->json(['message' => 'Product deleted successfully.']);
    }


}
