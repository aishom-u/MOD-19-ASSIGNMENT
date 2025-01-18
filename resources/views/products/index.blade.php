@extends('layouts.app')

@section('title', 'Product List')

@section('content')
<div class="container">
    <h1>Product List</h1>
    <form method="GET" action="{{ route('products.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
            <select name="sort" class="form-select">
                <option value="">Sort by</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
            </select>
            <select name="direction" class="form-select">
                <option value="asc" {{ $sortDirection == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ $sortDirection == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="200">
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection