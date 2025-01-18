
@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="container">
    <h2 class="my-4">{{ $product->name }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product ID: {{ $product->product_id }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p class="card-text"><strong>Stock Quantity:</strong> {{ $product->stock }}</p>
            <div class="mb-3">
                <strong>Product Image:</strong><br>
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="250">
                @else
                    <p>No image available.</p>
                @endif
            </div>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
        </div>
    </div>
</div>
@endsection