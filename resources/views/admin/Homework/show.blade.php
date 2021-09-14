<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homework') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            {{--                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homework Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customization Percentage</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap"><b>{{$homework->name}}</b></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="text-gray-500 sm:text-sm">
                                                            $
                                                          </span>
                                            {{$homework->price}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$homework->custom_price}}
                                            <span class="text-gray-500 sm:text-sm">
                                                            %
                                                          </span>
                                        </td>

                                    </tr>
                                <tr>
                                    <td colspan="10">{!! html_entity_decode( $homework->description) !!}</td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
