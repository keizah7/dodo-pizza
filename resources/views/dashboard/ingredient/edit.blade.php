@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.ingredient.title'),
            __('dashboard.edit.title')
        ],
    ])

    <section class="section">
        <div class="container-fluid columns">
            <form action="{{ route('dashboard.ingredient.update', $ingredient) }}" method ="POST" class="column is-half">
                @method('put')
                @csrf

                <div class="field">
                    <label class="label">@lang('dashboard.data.title')</label>
                    <div class="control">
                        <input value="{{ old('title', $ingredient->title) }}" name="title" class="input" type="text" placeholder="@lang('dashboard.data.title.placeholder')" required>
                    </div>
                    @error('title')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input value="1" name="removable" type="checkbox"@if($ingredient->removable){{ ' checked' }}@endisset>
                        @lang('dashboard.data.removable')
                    </label>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">@lang('dashboard.button.edit')</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('dashboard.ingredient.index') }}" class="button is-link">@lang('dashboard.button.back')</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
