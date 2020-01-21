@extends('layouts.main')

@section('content')
    <section class="pizza">
        <div class="pizza__content">
            @foreach($groups as $group)
                <div class="pizza__item">
                    <a href="{{ route('group.show', $group) }}" class="pizza__img"><img
                            src="{{ $group->product->first()->photo }}"
                            alt="Pica"></a>
                    <div class="pizza__info">
                        <h3>{{ $group->title }}</h3>
                        <p>
                            @foreach($group->product->first()->ingredient as $ingredient)
                                {{ $ingredient->title }}{{ $loop->last ? '' : ', ' }}
                            @endforeach
                        </p>
                    </div>
                    <div class="pizza__button">
                        <button class="btn">nuo {{ $group->product->first()->price }} €</button>
                    </div>
                    <div class="pizza__button from-lg">
                        <span>nuo {{ $group->product->first()->price }} €</span>
                        <button class="btn">Choose</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

