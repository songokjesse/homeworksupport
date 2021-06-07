<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Download Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <br/>
                <h1 class="font-medium text-sm text-green-600 text-center"><b>PAYMENT SUCCESSFUL</b></h1>
                <div class="text-center">
                    <i>Click Button to Download Answer</i>
                </div>
                                        <div class="text-center">
                                            @foreach($homework_files as $file)
                                                <a href="{{route('file_download', $file->id)}}">
                                                    <x-button class="ml-3 bg-green-300">
                                                        {{$file->OriginalName}}
                                                    </x-button>
                                                </a>
                                            @endforeach
                                        </div>
                <br/>
                <hr/>
                <div class="flex flex-col md:flex-row sm:justify-center items-center   ">
                            @foreach($homework as $item)

                                @if($item->customization === 1)
                                    <form class="">
                                        <div class="mt-4">
                                            <textarea name="description" class="w-full border bg-white rounded px-3 py-2 ">  </textarea>
                                        </div>

                                    </form>

                                @endif
                                @endforeach
                </div>

                <br />
            </div>
        </div>
    </div>
</x-app-layout>