@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4" style="height: 550px;">
                        <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="height: 350px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text" style="font-size: 0.9rem;">{{ Str::limit($product->description, 80) }}</p>
                            <p class="card-text"><strong>Price: </strong>${{ $product->price }}</p>
                            <a href="#" class="btn btn-sm btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
