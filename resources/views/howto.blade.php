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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
                {{ __('How To') }}
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div>

                    <h1 class="font-semibold text-xl text-gray-800 leading-tight ">How it works</h1>
                    <h3><u>Answer purchase</u></h3>

                    <ol class="list-decimal">
                        <li>Search the assignment.</li>
                        <li>Click on the title</li>
                        <li>Make payment.</li>
                        <li>Download answer file.</li>
                    </ol>
                    <br>
                    <h3><u>Answer Customization</u></h3>
                    If you want help in customization of your file, select the customization option.
                    <ol class="list-decimal">
                        <li>Make purchase.</li>
                        <li>Send the original files from your school site to info@homework-support.com</li>
                    </ol>
                    <br>
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight ">Disclaimer</h1>
                    Do not upload a purchased solution onto your school site. Use the files you downloaded from the school’s site to do the task and the answer file from the site as a guide to avoid plagiarism. Homework-support is NOT LIABLE if you do so.
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight ">NB. </h1>For MyITlab tasks even copy and paste will flag your work as plagiarized


                </div>
            </div>
        </div>
    </main>

</div>

</body>
</html>

