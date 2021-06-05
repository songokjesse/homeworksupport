<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Cancelled Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-red-500">PAYMENT CANCELLED</h1>
                <h2>We have Encountered a Problem with your Payment</h2>
                <a href="{{route('welcome')}}"> <x-button class="ml-3">Click to Go back</x-button></a>
            </div>
        </div>
    </div>
</x-app-layout>