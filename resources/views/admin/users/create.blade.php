<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            <a href="/admin/users" >
                                <x-button class="ml-3  justify-end">
                                    User List
                                </x-button>
                            </a>
                        </div>
                        <br>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                        <div class=" flex flex-col sm:justify-center pt-6 sm:pt-0">
                                            <!-- Session Status -->
                                            <x-auth-session-status class="mb-4" :status="session('status')" />

                                            <!-- Validation Errors -->
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                            <form method="POST" action="{{ route('users.store') }}">
                                            @csrf

                                            <!-- Email Address -->
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Name')" class="sm:font-bold"/>
                                                    <x-input id="email" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                                                </div>
                                                {{-- Homework Name--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Email')" class="sm:font-bold"/>

                                                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required  />
                                                </div>
                                                {{-- password--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Password')" class="sm:font-bold"/>
                                                    <x-input id="email" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required  />
                                                </div>
                                                {{-- confirm password--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Confirm Password')" class="sm:font-bold"/>
                                                    <x-input id="email" class="block mt-1 w-full" type="password" name="confirm-password" :value="old('confirm-password')" required  />
                                                </div>
                                                {{-- Assign Roles--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Roles')" class="sm:font-bold"/>
                                                    <select name="roles[]" autofocus class="w-full border bg-white rounded px-3 py-2 outline-none" multiple>
                                                        <option class="p-1" selected disabled>Select Role</option>
                                                        @foreach($roles as $item)
                                                            <option class="p-1" value="{{$item->name}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="flex items-center justify-end mt-4">
                                                    <x-button class="ml-3">
                                                        {{ __('Save') }}
                                                    </x-button>
                                                </div>
                                            </form>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

