<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div>
                <br>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider bg-gray-200">Message for Order ID: &nbsp; {{$post->orderId}}</th>
                                    </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{!! html_entity_decode($post->body) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                @foreach($post->comments as $comment)
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider bg-gray-200"> From:  <strong>{{ $comment->user->name }}</strong></th>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">  <p>{!! html_entity_decode($comment->comment ) !!}</p></td>
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <br/>
                            <h4><b>Comments</b></h4>
                            <form method="post" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="mt-4">
                                    <textarea name="comment"> </textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-3">
                                        {{ __('Add Comments') }}
                                    </x-button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

