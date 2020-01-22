@extends('layouts.main')

@section('content')
    <section class="pizza">
        @foreach($types as $type)
            @if($type->groups)
                <h2 class="pizza__title">{{ $type->title }}</h2>
            @endif
            <div class="pizza__content">
                @foreach($type->groups as $group)
                    <div class="pizza__item">
                        <a href="{{ route('group.show', $group) }}" class="pizza__img"><img
                                src="{{ $group->products->first()->photo ?? '/img/products/default.svg' }}"
                                alt="Pica"></a>
                        <div class="pizza__info">
                            <h3>{{ $group->title }}</h3>
                            <p>
                                @foreach($group->products->first()->ingredient as $ingredient)
                                    {{ $ingredient->title }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                        </div>
                        <div class="pizza__button">
                            <button class="btn">nuo {{ $group->products->first()->price }} €</button>
                        </div>
                        <div class="pizza__button from-lg">
                            <span>nuo {{ $group->products->first()->price }} €</span>
                            <button class="btn">Pasirinkti</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </section>
@endsection

