<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)


    {
        $products = Product::paginate(10);
        return view('pages.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));

    }

    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'stock' => 'required|numeric',
        'status' => 'required|boolean',
        'is_favorite' => 'required|boolean',



       ]);

       $product = new Product;
       $product->name = $request->name;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->category_id = $request->category_id;
       $product->stock = $request->stock;
       $product->status = $request->status;
       $product->is_favorite =$request->is_favorite;

       $product->save();

       //save image
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/product',$product->id . '.' . $image->getClientOriginalExtension());
            $product->image ='storage/product/' . $product->id . '.' . $image->getClientOriginalExtension();
            $product->save();
       }

       return redirect()->route('product.index')->with('success', 'Product created succes bro');
    }

    public function show($id)
    {
        return view('pages.product.show');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.product.edit', compact('product','categories'));
    }
    public function update(Request $request, $id)
    {
       $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'stock' => 'required|numeric',
        'status' => 'required|boolean',
        'is_favorite' => 'required|boolean',
       ]);

       $product = Product::findOrFail($id);
       $product->name = $request->name;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->category_id = $request->category_id;
       $product->stock = $request->stock;
       $product->status = $request->status;
       $product->is_favorite =$request->is_favorite;
       $product->save();

       //save image
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/product',$product->id . '.' . $image->getClientOriginalExtension());
            $product->image ='storage/product/' . $product->id . '.' . $image->getClientOriginalExtension();
            $product->save();
       }

      
  
       return redirect()->route('product.index')->with('success', 'Product update succes bro');
    }
    public function destroy( $id)
    {
         $product = Product::findOrFail($id);
         $product->delete();
         
        return redirect()->route('product.index')->with('success', 'Product successfully deleted');
    }
}



    

