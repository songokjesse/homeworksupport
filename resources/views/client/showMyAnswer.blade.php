<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <img src="{{$homework->category->url}}"  class="h-9 w-9 rounded-full" />

                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 ">
                                <table>
                                    <tr>
                                        <td class="flex  justify-end">
                                            @foreach($homework->homework_files as $file)
                                                <a href="{{route('file_download', $file->id)}}">
                                                    <x-button class="ml-3  justify-end bg-blue-300">{{$file->OriginalName}}</x-button>
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {!! html_entity_decode($homework->description) !!}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</x-app-layout>