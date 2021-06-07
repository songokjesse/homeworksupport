    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                    <table class="table-fixed min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                        <tr>
{{--                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>--}}
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Homework</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap ">
                                        <img src="{{$homework->category->url}}" class="h-9 w-9 rounded-full inline"/> &nbsp;
                                        {!! html_entity_decode( Str::limit($homework->name, 100)) !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex justify-end">
                                    <span class="text-gray-500 sm:text-sm">$ </span>
                                    {{$homework->price}}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap " >
                                    <label for="customization"></label>
                                    <input type="checkbox" id="customization"  value="{{$homework->custom_price}}" class="rounded px-3 py-2"/> &nbsp;
                               Answer Customization <i><small>(Check box if you require your answer to be customized)</small> </i></td>
                                <td></td>
                            </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap " >
                                <b>Total &nbsp; </b>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap  flex justify-end ">
                                <b>
                                    <span id="withCustomization" style="display:none">
                                        <span class="text-gray-500 sm:text-sm">$ </span>
                                        <span id="customizationValue">Custom</span>
                                    </span>
                                    <span id="noCustomization" style="display:block">
                                        <span class="text-gray-500 sm:text-sm">$ </span>
                                        {{$homework->price}}
                                    </span>
                                </b>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-end mt-4">
                        <input type="hidden" id="amount" value="{{$homework->price}}">
                        <input type="hidden" id="homework_id" value="{{$homework->id}}">
                        <div id="paypal-button-container"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        @push('child-scripts')
            <script>
                document.getElementById("customization").addEventListener("click", myFunction);
                let withCustomization = document.getElementById('withCustomization')
                let noCustomization = document.getElementById('noCustomization')

                let  customization = document.getElementById('customization').value;
                let amount =  document.getElementById('amount').value;
                let Total = (+amount + ((customization/100) * amount))

                let customize = document.getElementById("customization").value;
                function myFunction() {
                    if(document.getElementById("customization").checked === true){
                        withCustomization.style.display = "block";
                        noCustomization.style.display = "none";
                        document.getElementById("customizationValue").innerHTML = Total.toString();
                        document.getElementById('amount').value = Total;
                    }
                    if(document.getElementById("customization").checked === false){
                        withCustomization.style.display = "none";
                        noCustomization.style.display = "block";
                        document.getElementById('amount').value = amount;
                    }
                }
            </script>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        let  homework_id = document.getElementById('homework_id').value;
                        let amount =  document.getElementById('amount').value;

                        let appUrl = '{!! env('APP_URL')  !!}';
                        return fetch( appUrl+'payment', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json',
                                'Access-Control-Allow-Origin': 'https://homework-support.com/',
                                'Vary': 'Origin',
                                'X-CSRF-TOKEN': '{!! csrf_token() !!}',
                            },
                            body: JSON.stringify({
                                homework_id : homework_id,
                                amount : amount,
                            })
                        }).then(function (res) {
                            return res.json();
                        }).then(function (data) {
                            return data.result.id;
                        });
                    },
                    onApprove: function(data) {
                        let appUrl = '{!! env('APP_URL')  !!}';
                        let  homework_id = document.getElementById('homework_id').value;
                        return fetch(appUrl+'payment/success', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json',
                                'Access-Control-Allow-Origin': 'https://homework-support.com/',
                                'Vary': 'Origin',
                                'X-CSRF-TOKEN': '{!! csrf_token() !!}',
                            },
                            body: JSON.stringify({
                                orderId: data.orderID,
                            })
                        }).then(function (res) {
                            return res.json();
                        }).then(function (details) {
                            // window.location.href = appUrl +'downloadAnswer/'+ homework_id + '/order/' + data.orderID;
                        }).catch(function (error) {
                            // redirect to failed page if internal error occurs
                            console.log(error)
                            {{--window.location.href = '{!! route('payment.cancel') !!}';--}}

                        });
                    }
                }).render('#paypal-button-container');
                // This function displays Smart Payment Buttons on your web page.
            </script>
        @endpush

</x-app-layout>




