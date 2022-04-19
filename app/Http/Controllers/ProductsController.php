<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('list-products', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:150',
            'image'=> 'image|file|mimes:png,jpeg,jpg|max:2048',
            'category' => 'required|max:20'
        ]);

        if($request->file('image')) {
            $validatedData['image']=$request->file('image')->store('Images');
        };
        $product =new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->image = $validatedData['image'];
        $product->save();

        $category = new Category();
        $category->product_id = $product->id;
        $category->name = $validatedData['category'];
        $category->save();

        return redirect()->route('product.index')->with('message', 'Product Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::where('id', $id)->first();
        return view('detail-products', [
            'data'=> $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::where('id', $id)->first();
        return view('edit-products', [
            'data' => $data
        ]);
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
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:150',
            'image'=> 'image|file|mimes:png,jpeg,jpg|max:2048',
            'category' => 'required|max:20'
        ]);
        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('Images');
        };

        $product = Product::findOrFail($id);
        $product->update($validatedData);;
        $category = Category::where('product_id', $id)->first();
        $category->update([
            'name'=> $validatedData['category']
        ]);
        return redirect()->route('product.index')->with('message', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $category = Category::where('product_id', $id)->first();
        $category->delete();
        if($product->image){
            Storage::delete($product->image);
        }
        return redirect()->route('product.index')->with('message', 'Product Deleted!');
    }
}
