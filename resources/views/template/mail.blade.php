<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">ß
</head>
<body>
    @php
        $total = 0;
    @endphp
    <div class="container">
        <h1>You Have Already Do the Payment</h1>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cart->product->name }}</td>
                        <td>DLR. {{ number_format($cart->product->price) }}-,</td>
                        <td>{{ $cart->qty }}</td>
                        <td>IDR. {{ number_format($cart->qty * $cart->product->price) }}-,</td>
                    </tr>
                    @php
                        $total += ($cart->qty * $cart->product->price);
                    @endphp
                @endforeach
            </tbody>
        </table>
        <h1>Total Price : IDR. {{ number_format($total) }}</h1>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>