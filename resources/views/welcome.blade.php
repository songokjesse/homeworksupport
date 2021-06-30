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
            <img class="inline align-right"src="https://res.cloudinary.com/homework-support-com/image/upload/v1620641856/files/whatsapp_nbkmsj.png" width="30" height="30"/>
            <div class="inline  text-left">
                <b> +1 (480) 866-1691</b>
            </div>
            <form method="GET" action="{{route('welcome')}}" class="inline">
                @csrf
                <div class="flex relative w-500px h-48px group justify-center items-center z-1001 pl-8">
                    <input type="search" name="homework_search" value="{{ old('homework_search') }}" placeholder="Search for Questions" class="block mt-1 w-full rounded"/>

                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50"><g fill="none" fill-rule="evenodd"><g fill-rule="nonzero"><path fill="#5468FF" d="M6.502 0h36.379c3.58 0 6.502 2.92 6.502 6.529v36.53c0 3.596-2.908 6.528-6.502 6.528H6.502C2.922 49.587 0 46.669 0 43.06V6.512C0 2.92 2.905 0 6.502 0"/><path fill="#FFF" d="M29.837 11.07v-1.7c0-1.189-.96-2.152-2.144-2.151h-4.998a2.148 2.148 0 00-2.144 2.15v1.746c0 .195.18.33.375.285a15.564 15.564 0 014.35-.615c1.426 0 2.837.194 4.201.57a.29.29 0 00.36-.285M16.14 13.295l-.854-.857a2.138 2.138 0 00-3.03 0l-1.021 1.022a2.147 2.147 0 000 3.04l.84.843c.135.134.33.103.45-.031a16.46 16.46 0 011.635-1.926 15.523 15.523 0 011.935-1.653c.15-.09.164-.302.045-.438m9.12 5.399v7.355c0 .21.227.362.42.256l6.513-3.384c.148-.074.193-.256.12-.405a8.097 8.097 0 00-6.752-4.107c-.15 0-.3.12-.3.285m0 17.719c-5.43 0-9.842-4.424-9.842-9.868s4.412-9.866 9.842-9.866c5.432 0 9.842 4.422 9.842 9.866s-4.395 9.868-9.842 9.868m0-23.884c-7.712 0-13.967 6.272-13.967 14.016 0 7.746 6.255 14.004 13.967 14.004 7.712 0 13.967-6.273 13.967-14.018 0-7.746-6.24-14.002-13.967-14.002"/></g></g></svg>
                    </button>
                </div>
            </form>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="table-auto overflow-x-scroll min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homework</th>
                            {{--                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>--}}
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($homework as $work)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('show', $work->id)}}">
                                        <img src="{{$work->category->url}}" class="h-9 w-9 rounded-full"/>
                                    </a>
                                </td>
                                <td class="overflow-x-scroll px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('show', $work->id)}}">
                                        {{--                                    {!! html_entity_decode( Str::limit($work->name,50)) !!}--}}
                                                                          <p class="overflow-visible">  {!! html_entity_decode( $work->description) !!}</p>
{{--                                        {{$work->description}}--}}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-gray-500 sm:text-sm">$ </span>
                                    {{$work->price}}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <hr/>
                    <br/>
                    {{ $homework->links() }}

                </div>
            </div>
        </div>
    </main>

</div>

</body>
</html>
