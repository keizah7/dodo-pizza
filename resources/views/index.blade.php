@extends('layouts.main')

@section('content')
    @include('layouts.carousel')

    <section class="pizza">
        @foreach($types as $type)
            <h2 class="pizza__title">{{ $type->title }}</h2>
            <div class="pizza__content">
                @foreach($type->groups as $group)
                    <div class="pizza__item">
                        <img class="pizza__img" src="{{ $group->product->photo ?? '/img/products/default.svg' }}" alt="Pica" data-group="{{ $group->id }}">
                        <div class="pizza__info">
                            <h3>{{ $group->title }}</h3>
                            <p>
                                @foreach($group->product->ingredient as $ingredient)
                                    {{ $ingredient->title }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                        </div>
                        <div class="pizza__button">
                            <button class="btn" data-group="{{ $group->id }}">nuo {{ $group->product->price }}</button>
                        </div>
                        <div class="pizza__button from-lg">
                            <span>nuo {{ $group->product->price }}</span>
                            <button class="btn" data-group="{{ $group->id }}">Pasirinkti</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </section>

@endsection
