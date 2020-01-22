@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.group.title'),
            __('dashboard.edit.title')
        ],
    ])

    <section class="section">
        <div class="container-fluid columns">
            <form action="{{ route('dashboard.group.update', $group) }}" method ="POST" class="column is-half">
                @method('put')
                @csrf

                <div class="field">
                    <label class="label">@lang('dashboard.data.type_id')</label>
                    <div class="control">
                        <div class="select">
                            <select name="type_id" required>
                                <option value="">@lang('dashboard.data.type_id.placeholder')</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                    @if(old('type_id', $group->type_id) == $type->id){{ ' selected' }}@endif
                                    >{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('type_id')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.title')</label>
                    <div class="control">
                        <input value="{{ old('title', $group->title) }}" name="title" class="input" type="text" placeholder="@lang('dashboard.data.title.placeholder')" required>
                    </div>
                    @error('title')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.priority')</label>
                    <div class="control">
                        <input value="{{ old('priority', $group->priority) }}" name="priority" class="input" type="number" placeholder="0" required>
                    </div>
                    @error('priority')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">@lang('dashboard.button.edit')</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('dashboard.group.index') }}" class="button is-link">@lang('dashboard.button.back')</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
