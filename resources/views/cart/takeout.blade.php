@extends('layouts.main')

@section('content')
<section class="cart">
    <h2 class="cart__title">Išsinešimui</h2>
    <div class="cart__content">
        <form action="{{ route('cart.store') }}" method="post" class="form">
            @csrf

            <div class="field">
                <label for="">@lang('data.name')</label>
                <div class="control">
                    <input name="name" type="text" placeholder="@lang('data.name.placeholder')" value="{{ old('name') }}" class="input" required>
                </div>
            </div>
            @error('name')<p class="help is-danger">{{ $message }}</p>@enderror

            <div class="field">
                <label for="">@lang('data.email')</label>
                <div class="control">
                    <input name="email" type="email" placeholder="@lang('data.email.placeholder')" value="{{ old('email') }}" class="input" required>
                </div>
            </div>
            @error('email')<p class="help is-danger">{{ $message }}</p>@enderror

            <div class="field">
                <label for="">@lang('data.comment')</label>
                <div class="control">
                    <textarea name="comment" rows="5" placeholder="@lang('data.comment.placeholder')">{{ old('comment') }}</textarea>
                </div>
            </div>
            @error('comment')<p class="help is-danger">{{ $message }}</p>@enderror

            <div class="field">
                <label for="">@lang('data.pickup_id')</label>
                <div class="control">
                    @foreach($pickups as $pickup)
                        <div>
                            <label for="">
                            <input type="radio" name="pickup_id" value="{{ $pickup->id }}"  required>

                                <b>{{ $pickup->title }}</b>
                                <p>{{ $pickup->address }}</p>
                                <p>{{ $pickup->description }}</p>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            @error('pickup_id')<p class="help is-danger">{{ $message }}</p>@enderror

            <div class="field is-grouped">
                <div class="control">
                    <a href="{{ route('cart.index') }}"
                        class="btn btn--white btn--square">@lang('data.button.back')</a>
                </div>
                <div class="control">
                    <button type="submit" class="btn is-primary">@lang('data.button.order')</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
