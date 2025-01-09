<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class WebshopController extends Controller
{

    public function index()
    {
        return response()->json(Product::all());
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
       
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
        ]);
        $product = Product::find($id);

        $product->update($validated);
        return response()->json($product);
    }
}