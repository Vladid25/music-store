@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">Users</h2>
    <ul class="divide-y divide-gray-200">
        @foreach($users as $user)
            <li class="py-4 flex items-center">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
                <div class="ml-auto">
                    <a href="{{ route('chat.show', $user->id) }}" class="text-blue-500 hover:underline">
                        Chat
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
