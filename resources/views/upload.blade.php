@extends('layout')

@section('title', 'People')

@section('content')
    @if ($errors->any())
        {!! implode(
            '',
            $errors->all(
                '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-700 dark:text-red-400" role="alert"><span class="font-medium">:message.</div>',
            ),
        ) !!}
    @endif
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help" id="file_input" type="file" accept="text/xml" name="file">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Upload an xml file.</p>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
    </form>

@endsection
