<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/admin/categories" class="mt-4">
                        <x-button class="ml-3  justify-end">
                            Category List
                        </x-button>
                    </a>
                    <br/>
                    <br/>
                    <hr/>


                    <div class=" flex flex-col sm:justify-center pt-6 sm:pt-0">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Category Name')" class="sm:font-bold"/>

                                <x-input id="email" class="block mt-1 w-full" type="text" name="categoryName" value="{{$category->categoryName}}" required autofocus  />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-3">
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>