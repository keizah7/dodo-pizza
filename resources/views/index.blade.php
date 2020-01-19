@extends('layouts.main')

@section('content')
    @include('layouts.carousel')

    <section class="pizza">
        <div class="pizza__content">
            <div class="pizza__item">
                <a href="" class="pizza__img"><img
                        src="https://dodopizza-a.akamaihd.net/static/Img/Products/Pizza/lt-LT/99f8eca7-754a-4810-99b2-b64e9348a022.jpg"
                        alt="Pica"></a>
                <div class="pizza__info">
                    <h3>Pizza</h3>
                    <p>Description</p>
                </div>
                <div class="pizza__button">
                    <button class="btn">price</button>
                </div>
                <div class="pizza__button from-lg">
                    <span>price</span>
                    <button class="btn">Choose</button>
                </div>
            </div>
        </div>
    </section>
@endsection

