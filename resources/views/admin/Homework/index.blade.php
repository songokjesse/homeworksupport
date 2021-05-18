<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homework') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            <a href="/admin/homework/create" >
                                <x-button class="ml-3  justify-end">
                                    Add HomeWork
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
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homework Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homework Description</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Files</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                           @foreach($homework as $work)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$work->id}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$work->category->categoryName}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{Str::limit($work->name,10)}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{!! html_entity_decode( Str::limit($work->description, 30)) !!}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="text-gray-500 sm:text-sm">
                                                            $
                                                          </span>
                                                        {{$work->price}}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <a href="{{route('HomeworkUpload', $work->id)}}">
                                                            <x-button class="ml-2 justify-end">
                                                            Files
                                                            </x-button>
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <a href="{{route('homework.edit', $work->id)}}"><button class="text-indigo-600 hover:text-indigo-900">Edit</button></a>
                                                        <form action="{{ route('homework.destroy',$work->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                                        </form>
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
                        {{ $homework->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
