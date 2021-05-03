<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            <a href="/admin/roles" >
                                <x-button class="ml-3  justify-end">
                                    Roles List
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

                                            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                                @csrf
                                                @method('PUT')
                                                {{-- Role Name--}}
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Role Name')" class="sm:font-bold"/>

                                                    <x-input id="email" class="block mt-1 w-full" type="text" name="name" :value="$role->name" required  />
                                                </div>
                                                <!-- Permissions -->
                                                <div class="mt-4">
                                                    <x-label for="email" :value="__('Permissions')" class="sm:font-bold"/>
                                                    @foreach($permission as $value)
                                                        <label class="flex items-center">
                                                            <input type="checkbox" name="permission[]" value="{{$value->id}}" class="rounded px-3 py-2"
                                                                   @if(in_array($value->id, $rolePermissions) )
                                                                       checked
                                                                       @endif
                                                            />
{{--                                                            {{  Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'rounded px-3 py-2 '))  }}--}}
                                                           &nbsp; {{ $value->name }}</label>

                                                    @endforeach
{{--                                                    <selectname name="permission[]" autofocus class="w-full border bg-white rounded px-3 py-2 outline-none" multiple="true">--}}
{{--                                                        <option class="p-1" selected disabled>Select Permissions</option>--}}
{{--                                                        @foreach($permission as $item)--}}
{{--                                                            <option class="p-1" value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
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

