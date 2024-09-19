@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="my-4">Edit Category</h1>

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
