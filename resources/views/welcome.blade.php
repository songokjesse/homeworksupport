<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.guest_navigation')

<!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
{{--            <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--                {{ __('Home') }}--}}
{{--            </h2>--}}
            <form method="GET" action="{{route('welcome')}}" class="inline">
                @csrf
                <div class="flex relative w-500px h-48px group justify-center items-center z-1001 pl-8">
                    <input type="search" name="homework_search" value="{{ old('homework_search') }}" placeholder="Search for Questions" class="block mt-1 w-full rounded"/>
                    <span class="rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50"><g fill="none" fill-rule="evenodd"><g fill-rule="nonzero"><path fill="#5468FF" d="M6.502 0h36.379c3.58 0 6.502 2.92 6.502 6.529v36.53c0 3.596-2.908 6.528-6.502 6.528H6.502C2.922 49.587 0 46.669 0 43.06V6.512C0 2.92 2.905 0 6.502 0"/><path fill="#FFF" d="M29.837 11.07v-1.7c0-1.189-.96-2.152-2.144-2.151h-4.998a2.148 2.148 0 00-2.144 2.15v1.746c0 .195.18.33.375.285a15.564 15.564 0 014.35-.615c1.426 0 2.837.194 4.201.57a.29.29 0 00.36-.285M16.14 13.295l-.854-.857a2.138 2.138 0 00-3.03 0l-1.021 1.022a2.147 2.147 0 000 3.04l.84.843c.135.134.33.103.45-.031a16.46 16.46 0 011.635-1.926 15.523 15.523 0 011.935-1.653c.15-.09.164-.302.045-.438m9.12 5.399v7.355c0 .21.227.362.42.256l6.513-3.384c.148-.074.193-.256.12-.405a8.097 8.097 0 00-6.752-4.107c-.15 0-.3.12-.3.285m0 17.719c-5.43 0-9.842-4.424-9.842-9.868s4.412-9.866 9.842-9.866c5.432 0 9.842 4.422 9.842 9.866s-4.395 9.868-9.842 9.868m0-23.884c-7.712 0-13.967 6.272-13.967 14.016 0 7.746 6.255 14.004 13.967 14.004 7.712 0 13.967-6.273 13.967-14.018 0-7.746-6.24-14.002-13.967-14.002"/></g></g></svg>
                    </span>
                </div>
            </form>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div id="main" class="grid grid-cols-4 gap-1 justify-evenly">
                    @foreach ($homework as $item)
                    <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                        <div class=" text-white flex items-center absolute rounded-full py-5 px-5 shadow-xl bg-gray-200 left-4 -top-6">
                            <img src="{{$item->category->url}}" class="h-9 w-9"/>
                        </div>
                        <div class="mt-8">
                            <p class="text-xl font-semibold my-2">{{$item->category->categoryName}}</p>
                            <div class="flex space-x-2 text-gray-400 text-sm">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p>{{$item->name}}</p>
                            </div>
                            <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                <p>{!! html_entity_decode( Str::limit($item->description, 100)) !!}</p>
                            </div>
                            <div class="border-t-2"></div>

                            <div class="flex justify-between">
                                <div class="my-2">
                                    <div class="flex space-x-2">
                                        <x-button class="ml-3  justify-end">
                                        Show Question
                                        </x-button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <hr/>
    <br/>
    {{ $homework->links() }}
</div>
</body>
</html>





