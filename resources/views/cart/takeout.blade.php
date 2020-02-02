@extends('layouts.main')

@section('content')
<section class="cart">
    <h2 class="cart__title">Išsinešimui</h2>
    <div class="cart__content">
        <form action="{{ route('cart.store') }}" method="post">
            @csrf
            <div>
                <label>
                    Vardas
                    <input type="text" name="name" required>
                    @error('name')<p class="help is-danger">{{ $message }}</p>@enderror
                </label>
            </div>
            <div>
                <label>
                    El. paštas
                    <input type="email" name="email" required>
                    @error('email')<p class="help is-danger">{{ $message }}</p>@enderror
                </label>
            </div>
            <div>
                <label for="">Komentaras</label><textarea name="comment" id="" cols="30" rows="10"></textarea>
                @error('comment')<p class="help is-danger">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="">Išsinešimui</label>
                @foreach($pickups as $pickup)
                    <div>
                        <input type="radio" name="pickup_id" value="{{ $pickup->id }}"  required> <b>{{ $pickup->title }}</b> {{ $pickup->address }}
                        <p>
                            {{ $pickup->description }}
                        </p>
                    </div><br>
                @endforeach
                @error('pickup_id')<p class="help is-danger">{{ $message }}</p>@enderror
            </div>


            <button type="submit">Uzsakyti</button>
        </form>
    </div>
</section>
@endsection
