@extends('layout')

@section('title', 'People')

@section('content')
    @if ($people)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Adóazonosító jel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Teljes Név
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Azonosító
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Egyéb azonosító
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Belépés
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kilépés
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email cím
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Feldolgozott
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th class="px-6 py-4">
                                {{ $person['tax_identifier'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $person['fullname'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person['identifier'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person['other_identifier'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person['login'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person['logout'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person['email'] }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($person['log']['success'])
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="green"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
    @endif
@endsection
