@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="my-4">Admin Dashboard</h1>
            <div class="list-group">
                <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Manage Categories</h5>
                    <p class="mb-1">View, create, edit, and delete categories.</p>
                </a>
                <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Manage Products</h5>
                    <p class="mb-1">View, create, edit, and delete products.</p>
                </a>
            </div>
        </div>
    </div>
@endsection
