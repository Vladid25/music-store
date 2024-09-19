@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="my-4">Create Category</h1>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
