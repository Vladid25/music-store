@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Create Category</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
