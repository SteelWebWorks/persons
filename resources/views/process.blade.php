@extends('layout')

@section('title', 'Process')

@section('content')
    @foreach ($messages as $message)
        @if ($message['success'])
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-700 dark:text-green-400">
                {{ $message['message'] }}
            </div>
        @else
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-700 dark:text-red-400">
                {{ $message['message'] }}
            </div>
        @endif
    @endforeach
@endsection
