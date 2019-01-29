<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email pour le paiement</title>
</head>
<body>
<p>Paiement facture</p>
@component('mail::message')
    Paiement ID : {{ $order->id }} <br> Email : {{ $order->email }} <br> Nom : {{ $order->username }} <br>
    Total : ${{ round($order->montant) }}

    {{--@foreach($order->products as $product)--}}
        {{--Nom : {{ $product->nom }}<br>--}}
        {{--Prix : {{ round($product->price / 100,2) }}<br>--}}
        {{--Quantité : {{ $product->pivot->quantity }}--}}
    {{--@endforeach--}}
    @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
        Aller au site
    @endcomponent
    {{--@component('mail::button',['url' => config('app.url'),'color' => 'green'])--}}
       {{----}}
    {{--@endcomponent--}}
    Merci pour votre choix
    Regards <br>
    {{ config('app.name') }}
@endcomponent

</body>
</html>