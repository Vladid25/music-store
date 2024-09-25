@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">Create Product</h1>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Stock Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
