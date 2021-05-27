<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homework') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            <a href="/admin/homework" >
                                <x-button class="ml-3  justify-end">
                                    HomeWork List
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

                                            <form method="POST" action="{{ route('homework.update', $homework->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Email Address -->
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Category Name')" class="sm:font-bold"/>
                                                    <select name="category_id" autofocus class="w-full border bg-white rounded px-3 py-2 outline-none">
                                                        <option class="p-1" selected disabled>Select Homework Category</option>
                                                        @foreach($category as $item)
                                                            @if($homework->category_id == $item->id)
                                                            <option class="p-1" value="{{$item->id}}" selected>{{$item->categoryName}}</option>
                                                            @else
                                                                <option class="p-1" value="{{$item->id}}" >{{$item->categoryName}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Homework Name--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Homework Name')" class="sm:font-bold"/>

                                                    <x-input id="email" class="block mt-1 w-full" type="text" name="name" value="{{$homework->name}}" required  />
                                                </div>
                                                {{-- Homework Price--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Homework Price')" class="sm:font-bold"/>
                                                    <div class="mt-1 relative rounded-md shadow-sm">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                          <span class="text-gray-500 sm:text-sm">
                                                            $
                                                          </span>
                                                        </div>
                                                        <input type="text" name="price" id="price" value="{{$homework->price}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Customization Percentage')" class="sm:font-bold"/>
                                                    <div class="mt-1 relative rounded-md shadow-sm">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                          <span class="text-gray-500 sm:text-sm">
                                                            %
                                                          </span>
                                                        </div>
                                                        <input type="text" name="custom_price" id="custom_price" value="{{$homework->custom_price}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                                    </div>

                                                    {{--                                                    <x-input id="email" class="block mt-1 w-full" type="number" min="0.00" name="price" :value="old('price')" required  />--}}
                                                </div>
                                                {{-- Homework Description--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Homework Description')" class="sm:font-bold"/>
                                                    <textarea name="description" class="w-full border bg-white rounded px-3 py-2 ">
                                                        {{Str::of($homework->description)->trim()}}
                                                    </textarea>
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

