<x-dropzone>
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
                            <a href="/admin/homework/create" >
                                <x-button class="ml-3  justify-end">
                                  Add  HomeWork
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

                                            <br />
                                    {{--  Upload Files--}}
                                        <form class="dropzone" id="dropzone" method="" action="{{route('saveHomeworkFiles')}}" accept-charset="utf-8" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="homework_id" value="{{$homework_id}}">
                                            <div class="dz-message">
                                                Drag and Drop Single/Multiple Files Here<br>
                                            </div>
                                        </form>
                                        </div>
                                        <br/>
                                        <hr/>
                                        <br/>

                                    {{-- Display Uploaded Files--}}
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                        <table class="table-auto min-w-full divide-y divide-gray-200">
                                                            <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Files</th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200">
                                                            @foreach($homework as $work)
                                                                <tr>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{$loop->iteration}}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        {{$work->filePath}}
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <a href="#"><button class="text-indigo-600 hover:text-indigo-900">Edit</button></a>
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
</x-dropzone>

