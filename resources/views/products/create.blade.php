{{-- resources/views/products/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container">
    <h2 class="my-4">Create a New Product</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="product-form">
        @csrf

        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Enter Product ID" required>
        </div>

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter Product Description"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock Quantity</label>
            <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter Stock Quantity">
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>


@endsection