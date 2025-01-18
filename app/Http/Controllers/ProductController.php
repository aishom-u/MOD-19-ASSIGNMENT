<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
  
    $query = Product::query();


    $sortDirection = 'asc'; 


    if ($request->has('sort') && in_array($request->sort, ['name', 'price'])) {
        $query->orderBy($request->sort, $request->direction ?? $sortDirection);

        if ($request->has('direction') && in_array($request->direction, ['asc', 'desc'])) {
            $sortDirection = $request->direction;
        }
    }

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('product_id', 'like', '%' . $search . '%')
              ->orWhere('name', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%')
              ->orWhere('price', 'like', '%' . $search . '%');
    }

    $products = $query->paginate(10);

    return view('products.index', compact('products', 'sortDirection'));
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
            'image' => 'required|image',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');

      
        Product::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);
       
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
       
        $request->validate([
            'product_id' => 'required|unique:products,product_id,' . $product->id,
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }
        $product->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
    
        $product->delete();
        return redirect()->route('products.index');
    }
}
