@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="my-4">Products</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Create Product</a>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
