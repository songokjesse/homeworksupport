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
                <b> +1(480) 485-8762</b>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
                {{ __('HomeWork') }}
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <img src="{{$homework->category->url}}"  class="h-9 w-9 rounded-full" />

                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 ">
                                        <table>
                                            <tr>
                                                <td class="flex  justify-end">
                                                    @foreach($homework->homework_files as $file)
                                                    <a href="{{route('file_download', $file->id)}}">
                                                        <x-button class="ml-3  justify-end bg-blue-300">{{$file->OriginalName}}</x-button>
                                                    </a>
                                                    @endforeach
                                                   <a href="{{route('ShowAnswer', $homework->id)}}">
                                                       <x-button class="ml-3  justify-end">Download Answers </x-button>
                                                   </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {!! html_entity_decode($homework->description) !!}
                                                </td>
                                            </tr>
                                        </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </main>
    <hr/>
    <br/>
</div>
</body>
</html>






