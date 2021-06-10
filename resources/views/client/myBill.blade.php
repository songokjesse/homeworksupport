<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="justify-end">
                <x-button class=""><b>TOTAL SPENT &nbsp; = &nbsp; </b>
                    &nbsp;
                <span class="text-white sm:text-sm">
                $
                </span>
                {{$totals}}</x-button>
            </div>
            <br/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PayPal OrderID
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PayPal Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Amount
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Date
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($payments as $order)
                    <tr>
                        <td class="px-6 py-4 ">
                            {{$order->order_id}}
                        </td>
                        <td class="px-6 py-4 ">
                            {{$order->payer_email}}
                        </td>
                        <td class="px-6 py-4 ">
                            {{$order->status}}
                        </td>
                        <td class="px-6 py-4 ">
                             <span class="text-gray-500 sm:text-sm">
                             $
                             </span>
                            {{$order->amount}}
                        </td>
                        <td class="px-6 py-4 ">
                            {{$order->created_at}}
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>