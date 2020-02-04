@extends('layouts.main')

@section('content')
    <section class="cart">
        <h2 class="cart__title">Pristatymas</h2>
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
                    <label for="">@lang('data.phone')</label>
                    <div class="control">
                        <input name="phone" type="text" placeholder="@lang('data.phone.placeholder')" value="{{ old('phone') }}" class="input" max="12" required>
                    </div>
                </div>
                @error('phone')<p class="help is-danger">{{ $message }}</p>@enderror

                <div class="field">
                    <label for="">@lang('data.address')</label>
                    <div class="control">
                        <input name="address" type="text" placeholder="@lang('data.address.placeholder')" value="{{ old('address') }}" class="input" required>
                    </div>
                </div>
                @error('address')<p class="help is-danger">{{ $message }}</p>@enderror

                <div class="field">
                    <label for="">@lang('data.comment')</label>
                    <div class="control">
                        <textarea name="comment" rows="5" placeholder="@lang('data.comment.placeholder')">{{ old('comment') }}</textarea>
                    </div>
                </div>
                @error('comment')<p class="help is-danger">{{ $message }}</p>@enderror


                <div class="field is-grouped">
                    <div class="control">
                        <a href="{{ route('cart.index') }}"
                            class="btn btn--white btn--square">@lang('data.button.back')</a>
                    </div>
                    <div class="control">
                        <button class="btn is-primary">@lang('data.button.order')</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
