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
                                        <livewire:file :homework="$homework"/>
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

