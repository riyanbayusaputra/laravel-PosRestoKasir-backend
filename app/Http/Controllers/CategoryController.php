<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)


    {
        $categories = Category::paginate(10);
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
       
        return view('pages.category.create');

    }
    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required',
        'description' => 'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB



       ]);

       $category = new Category;
       $category->name = $request->name;
       $category->description = $request->description;


       

       //save image
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/category',$category->id . '.' . $image->getClientOriginalExtension());
            $category->image ='storage/category/' . $category->id . '.' . $image->getClientOriginalExtension();
            $category->save();
       }

       return redirect()->route('category.index')->with('success', 'Product created succes bro');
    }
    public function edit( $id)
    {
       
        $category = Category::findOrFail($id);
        return view('pages.category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
       $request->validate([
        'name' => 'required',
        'description' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 



       ]);

       $category = Category::find($id);
       $category->name = $request->name;
       $category->description = $request->description;


       $category->save();

       //save image
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/category',$category->id . '.' . $image->getClientOriginalExtension());
            $category->image ='storage/category/' . $category->id . '.' . $image->getClientOriginalExtension();
            $category->save();
       }

       return redirect()->route('category.index')->with('success', 'Product created succes bro');
    }
    public function destroy( $id)
    {
         $category = Category::findOrFail($id);
         $category->delete();
         
        return redirect()->route('category.index')->with('success', 'Product successfully deleted');
    }
}
