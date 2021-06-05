<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.tiny.cloud/1/d59129ybq6qxkt6okcmnibu71qyogrybfi27nm5v884lr0ma/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script
                src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}" async>
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <img class="inline align-right" src="https://res.cloudinary.com/homework-support-com/image/upload/v1620641856/files/whatsapp_nbkmsj.png" width="30" height="30" alt=""/>
                        <div class="inline  text-left">
                            <b> +1 (480) 866-1691</b>
                        </div>
                        <div class="inline text-right">{{ $header }}</div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <livewire:scripts />
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
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
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}',
                        },
                        body: JSON.stringify({
                            orderId: data.orderID,
                        })
                    }).then(function (res) {
                        return res.json();
                    }).then(function (details) {
                        window.location.href = appUrl +'/downloadAnswer/'+ homework_id;
                    }).catch(function (error) {
                        // redirect to failed page if internal error occurs
                        // console.log(error)
                        window.location.href = '{!! route('payment.cancel') !!}';

                    });
                }
            }).render('#paypal-button-container');
            // This function displays Smart Payment Buttons on your web page.
        </script>
    </body>
</html>
