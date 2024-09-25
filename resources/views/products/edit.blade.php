@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">Edit Product</h1>

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Stock Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
