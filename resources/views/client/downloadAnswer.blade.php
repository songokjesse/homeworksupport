<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Download Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
                <br/>
                <h1 class="font-medium text-sm text-green-600 text-center"><b>PAYMENT SUCCESSFUL</b></h1>
                <div class="text-center">
                    <b>Disclaimer</b>
                    <p>
                        Do not upload a purchased solution onto your school site. Use the files you downloaded from the schools site to do the task and the answer file as a guide to avoid plagiarism. Homework Support is <b>NOT LIABLE</b>  if you do so.
                    </p>
                    <p>
                        <b>NB. </b><i>For MyITlab tasks even copy and paste will flag your work as plagiarized</i>
                    </p>
                </div>
            <hr/>
            <br/>
                                        <div class="text-center">
                                            <p><i>Click Button to Download Answer</i></p>

                                        @foreach($homework_files as $file)
                                                <a href="{{route('file_download', $file->id)}}">
                                                    <x-button class="ml-3 bg-green-300">
                                                        {{$file->OriginalName}}
                                                    </x-button>
                                                </a>
                                            @endforeach
                                        </div>
                <br/>

                <div >
                            @foreach($homework as $item)

                                @if($item->customization === 1)
                            <hr/>
                                    <form class="" method="post" action="">
                                        @csrf
                                        <div class="mt-6">
                                            <x-label for="email" :value="__('How do you want your answer to be Customized?')" class="sm:font-bold"/>

                                            <textarea name="description" >  </textarea>
                                        </div>

                                        <div class="mt-4">
                                            <x-label for="email" :value="__('If you have any files for Instructions you can upload it here')" class="sm:font-bold"/>

                                            <x-input id="email" class="block mt-1 w-full" type="file" name="file" :value="old('name')"  />
                                        </div>
                                        <br/>
                                        <hr/>
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-3">
                                                {{ __('Send Message') }}
                                            </x-button>
                                        </div>

                                    </form>

                                @endif
                                @endforeach
                </div>

                <br />
            </div>
{{--        </div>--}}
    </div>
</x-app-layout>
