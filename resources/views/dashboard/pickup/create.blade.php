@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.pickup.title'),
            __('dashboard.create.title')
        ],
    ])

    <section class="section">
        <div class="container-fluid columns">
            <form action="{{ route('dashboard.pickup.store') }}" method ="POST" class="column is-half">
                @csrf

                <div class="field">
                    <label class="label">@lang('dashboard.data.title')</label>
                    <div class="control">
                        <input value="{{ old('title') }}" name="title" class="input" type="text" placeholder="@lang('dashboard.data.title.placeholder')" required>
                    </div>
                    @error('title')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.address')</label>
                    <div class="control">
                        <input value="{{ old('address') }}" name="address" class="input" type="text" placeholder="@lang('dashboard.data.address.placeholder')" required>
                    </div>
                    @error('address')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.description')</label>
                    <div class="control">
                        <textarea name="description" class="textarea"
                                  placeholder="@lang('dashboard.data.description.placeholder')"
                                  required>{{ old('description', __('dashboard.data.description.value')) }}
                        </textarea>
                    </div>
                    @error('description')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">@lang('dashboard.button.create')</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('dashboard.pickup.index') }}" class="button is-link">@lang('dashboard.button.back')</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
