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
                {{ __('Contact Us') }}
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('save_contact') }}">
                        @csrf

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Name')" class="sm:font-bold"/>

                                <x-input id="email" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" class="sm:font-bold"/>

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="email" :value="__('Message')" class="sm:font-bold"/>
                                <textarea name="message" class="w-full border bg-white rounded px-3 py-2 ">  </textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-3">
                                    {{ __('Send Message') }}
                                </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>





