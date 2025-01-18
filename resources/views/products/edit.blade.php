@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Product: {{ $product->name }}</h2>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Enter Product ID" value="{{ $product->product_id }}" required>
        </div>

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter Product Description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock Quantity</label>
            <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter Stock Quantity" value="{{ $product->stock }}">
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <small class="form-text text-muted">Leave blank to keep the current image.</small>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="100">
            @else
                <p>No image available.</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection