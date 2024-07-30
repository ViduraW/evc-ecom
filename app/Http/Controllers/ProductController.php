<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::where('seller_id' , '=' , Auth::id()) -> paginate();

        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name', 'id');
        return view('product.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        $product->seller_id   = Auth::id();
        $product->category_id = $request->category_id;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->qty         = $request->qty;
        $product->image       = $request->image;

        $product->save();

        return Redirect::route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View {
        $product = Product::where('seller_id' , '=' , Auth::id()) -> find($id);
        $categories = Category::pluck('name', 'id');
        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        // $product->seller_id   = $request->seller_id;
        $product->category_id = $request->category_id;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->qty         = $request->qty;
        $product->image       = $request->image;
        // dd($product);
        $product->save();

        return Redirect::route('products.index')
            ->with('success', 'Product update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
