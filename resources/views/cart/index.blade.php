<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>&#x1F355; Dodo Pizza Vilnius | Pristatymas per 60 minučių arba pica nemokamai</title>
        <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    </head>
    <body>
@include('layouts.header')

    <section class="cart">
        <h2 class="cart__title">Krepšelis</h2>
        <div class="cart__content">
            @forelse($products as $product)
                <div class="cart__item">
                    <div class="cart__info">
                        <div style="display: flex;">
                            <img src="{{ $product->photo }}" alt="">
                            <div style="margin-left: 1em">
                                <h2>{{ $product->group->title }}</h2>
                                <p>{{ $product->description }}</p>
                            </div>

                        </div>
                        <p>{{ $product->price }}</p>
                    </div>
                    <div class="cart__actions">
                        <div class="cart__delete">
                            <a href="{{ route('cart.delete', $product) }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 6H5.25L5.90993 15.8047C5.97132 16.8184 6.50848 17.5 7.39863 17.5H12.6014C13.4915 17.5 14.0133 16.8184 14.0901 15.8047L14.75 6Z" fill="#373535"></path>
                                <path d="M13.8498 3.00681L6.19643 3.00688C4.98382 2.88702 5.02127 4.36489 5 5L14.9917 4.99999C15.0165 4.38088 15.0624 3.12667 13.8498 3.00681Z" fill="#373535"></path>
                            </svg></a>
                        </div>
                        <div class="cart__quantity">
                            <button class="btn btn--primary">-</button>
                            <p>1</p>
                            <button class="btn btn--primary">+</button>
                        </div>
                    </div>
                </div>
            @empty
                Krepšelis yra tuščias
            @endforelse
        </div>


        <div class="cart__order">
            <div class="cart__price">
                <p>Užsakymo suma: (<a href="{{ route('cart.destroy') }}">Išvalyti</a>)</p>
                <p>10,50 €</p>
            </div>
            <div class="cart__buttons">
                <a href="{{ route('cart.shipping') }}" class="btn btn--block">Pristatymas</a>
                <a href="{{ route('cart.takeout') }}" class="btn btn--block">Išsinešimui</a>
            </div>
        </div>
    </section>
</body>
<script src="/js/app.min.js"></script>
</html>
