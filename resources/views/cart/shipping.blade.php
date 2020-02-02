@extends('layouts.main')

@section('content')
    <section class="cart">
        <h2 class="cart__title">Pristatymas</h2>
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
                    <label>
                        Telefono numeris
                        <input type="text" name="phone">
                        @error('phone')<p class="help is-danger" required>{{ $message }}</p>@enderror
                    </label>
                </div>
                <div>
                    <label>
                        Adresas
                        <input type="text" name="address" required>
                        @error('address')<p class="help is-danger">{{ $message }}</p>@enderror
                    </label>
                </div>
                <div>
                    <label for="">Komentaras</label>
                    <textarea name="comment" id="" rows="5"></textarea>
                </div>
                <input type="hidden" name="delivery" value="1">
                <button type="submit">Uzsakyti</button>
            </form>
        </div>
    </section>
@endsection
