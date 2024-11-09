<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductController::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('product_id', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }
    
        if ($request->has('sort_by') && in_array($request->input('sort_by'), ['name', 'price'])) {
            $query->orderBy($request->input('sort_by'), 'asc');
        }
    
        $products = $query->paginate(10);
        return view('products.index', compact('products'));
    }
    
    public function create()
{
    return view('products.create');
}
    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|unique:products',
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    ProductController::create($request->all());
    return redirect('/products')->with('success', 'Product created successfully');
}
    public function show($id)
{
    $product = ProductController::findOrFail($id);
    return view('products.show', compact('product'));
}

    public function edit($id)
{
    $product = ProductController::findOrFail($id);
    return view('products.edit', compact('product'));
}

    public function update(Request $request, $id)
{
    $request->validate([
        'product_id' => 'required|unique:products,product_id,' . $id,
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    $product = ProductController::findOrFail($id);
    $product->update($request->all());
    return redirect('/products')->with('success', 'Product updated successfully');
}

    public function destroy($id)
{
    $product = ProductController::findOrFail($id);
    $product->delete();
    return redirect('/products')->with('success', 'Product deleted successfully');
}
}

