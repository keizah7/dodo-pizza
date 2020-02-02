@extends('layouts.main')

@section('content')
    @include('layouts.notification')
    <section class="cart">
        <h2 class="cart__title">Krepšelis</h2>
        <div class="cart__content">
            @if($products->count())
                @foreach($products as $product)
                    <div class="cart__item">
                        <div class="cart__info">
                            <div style="display: flex;">
                                <img src="{{ $product->photo }}" alt="">
                                <div style="margin-left: 1em">
                                    <h2>{{ $product->group->title }}</h2>
                                    <p>{{ $product->description }} ({{ $product->size_title }})</p>
                                </div>

                            </div>
                            <p>{{ $product->price * $product->count }} {{ config('app.currency') }}</p>
                        </div>
                        <div class="cart__actions">
                            <div class="cart__delete">
                                <form action="{{ route('cart.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.75 6H5.25L5.90993 15.8047C5.97132 16.8184 6.50848 17.5 7.39863 17.5H12.6014C13.4915 17.5 14.0133 16.8184 14.0901 15.8047L14.75 6Z"
                                                fill="#373535"></path>
                                            <path
                                                d="M13.8498 3.00681L6.19643 3.00688C4.98382 2.88702 5.02127 4.36489 5 5L14.9917 4.99999C15.0165 4.38088 15.0624 3.12667 13.8498 3.00681Z"
                                                fill="#373535"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="cart__quantity">
                                <button class="btn btn--primary">-</button>
                                <p>{{ $product->count }}</p>
                                <button class="btn btn--primary">+</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="cart__order">
                    <div class="cart__price">
                        <p>Užsakymo suma:</p>
                        <p>{{ $totalPrice }} {{ config('app.currency') }}</p>
                        {{--            // padauginti is kiekio--}}
                    </div>
                    <div class="cart__buttons">
                        <a href="{{ route('cart.create', ['delivery' => 1]) }}" class="btn btn--block">Pristatymas</a>
                        <a href="{{ route('cart.create') }}" class="btn btn--block">Išsinešimui</a>
                    </div>
                </div>
            @else
                <div class="cart__item">
                    @lang('page.cart.empty')
                </div>
            @endif
        </div>
    </section>
@endsection
