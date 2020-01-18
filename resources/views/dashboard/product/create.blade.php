@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.product.title'),
            __('dashboard.create.title')
        ],
    ])

    <section class="section">
        <div class="container-fluid columns">
            <form action="{{ route('dashboard.product.store') }}" method="POST" class="column is-half" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label class="label">@lang('dashboard.data.size_title')</label>
                    <div class="control">
                        <input value="{{ old('size_title') }}" name="size_title" class="input" type="text"
                            placeholder="@lang('dashboard.data.size_title.placeholder')" required>
                    </div>
                    @error('size_title')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.description')</label>
                    <div class="control">
                        <textarea name="description" class="textarea"
                            placeholder="@lang('dashboard.data.description.placeholder')"
                            required>{{ old('description') }}</textarea>
                    </div>
                    @error('description')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.price')</label>
                    <div class="control">
                        <input value="{{ old('price') }}" name="price" class="input" type="number" min="0" step="0.01"
                            placeholder="@lang('dashboard.data.price.placeholder')" required>
                    </div>
                    @error('price')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.discount')</label>
                    <div class="control">
                        <input value="{{ old('discount') }}" name="discount" class="input" type="number"
                            placeholder="@lang('dashboard.data.discount.placeholder')" min="0">
                    </div>
                    @error('discount')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.priority')</label>
                    <div class="control">
                        <input value="{{ old('priority') }}" name="priority" class="input" type="number"
                            placeholder="@lang('dashboard.data.priority.placeholder')" required>
                    </div>
                    @error('priority')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.type_id')</label>
                    <div class="control">
                        <div class="select">
                            <select name="type_id" required>
                                <option value="">@lang('dashboard.data.type_id.placeholder')</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                    @if(old('type_id') == $type->id){{ ' selected' }}@endif
                                    >{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('type_id')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.group_id')</label>
                    <div class="control">
                        <div class="select">
                            <select name="group_id" required>
                                <option value="">@lang('dashboard.data.group_id.placeholder')</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                    @if(old('group_id') == $type->id){{ ' selected' }}@endif
                                    >{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('group_id')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field">
                    <label class="label">@lang('dashboard.data.photo')</label>
                    <div class="control">
                        <div class="file has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="photo">
                                <span class="file-cta">
                                    <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        @lang('dashboard.button.choose')
                                    </span>
                                </span>
                                <span class="file-name">
                                    @lang('dashboard.data.photo.empty')
                                </span>
                            </label>
                        </div>
                    </div>
                    @error('photo')<p class="help is-danger">{{ $message }}</p>@enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">@lang('dashboard.button.create')</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('dashboard.product.index') }}"
                            class="button is-link">@lang('dashboard.button.back')</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        const fileInput = document.querySelector('input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('.file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }
    </script>
@endsection
