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
                            <a href="/admin/users/create" >
                                <x-button class="ml-3  justify-end">
                                    Add User
                                </x-button>
                            </a>
                            <a href="/admin/roles" >
                                <x-button class="ml-3  justify-end">
                                    Roles
                                </x-button>
                            </a>
                        </div>
                        <br>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="table-auto min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($users as $user)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$loop->iteration}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$user->name}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$user->email}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if(!empty($user->getRoleNames()))
                                                            @foreach($user->getRoleNames() as $v)
                                                                <label class="badge badge-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <a href="{{route('users.edit', $user->id)}}"><button class="text-indigo-600 hover:text-indigo-900">Edit</button></a>
                                                        <a href="#" ><button class="text-red-600 hover:text-red-900">Delete</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
