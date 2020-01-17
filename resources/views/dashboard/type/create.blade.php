@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.type.index.title'),
            __('dashboard.create.title')
        ],
    ])

    <section class="section">
        <div class="container-fluid columns">
            <form action="{{ route('dashboard.type.store') }}" method ="POST" class="column is-one-third">
                @csrf

                <div class="field">
                    <label class="label">@lang('dashboard.type.title.title')</label>
                    <div class="control">
                        <input value="{{ old('title') }}" name="title" class="input" type="text" placeholder="@lang('dashboard.type.create.title.placeholder')" required>
                    </div>
                    @error('title')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.type.priority.title')</label>
                    <div class="control">
                        <input value="{{ old('priority') }}" name="priority" class="input" type="number" placeholder="0" required>
                    </div>
                    @error('priority')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">@lang('dashboard.button.create')</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('dashboard.type.index') }}" class="button is-link">@lang('dashboard.button.back')</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
