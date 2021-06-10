<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>


            <table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homework</th>
                    {{--                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>--}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($homework as $work)

                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{route('show', $work->id)}}">
                                <img src="{{$work->category->url}}" class="h-9 w-9 rounded-full"/>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{route('show', $work->id)}}">
                                {!! html_entity_decode( Str::limit($work->name,50)) !!}
                            </a>
                        </td>
                        {{--                                <td class="px-6 py-4 whitespace-nowrap">--}}
                        {{--                                    <a href="{{route('show', $work->id)}}">--}}
                        {{--                                    {!! html_entity_decode( Str::limit($work->description,100)) !!}--}}
                        {{--                                    </a>--}}
                        {{--                                </td>--}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-gray-500 sm:text-sm">$ </span>
                            {{$work->price}}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>