@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.product.title'),
            $product->size_title,
        ],
        'button' => [
            __('dashboard.button.back'),
            'dashboard.product.index'],
    ])

    <section class="hero is-main-hero">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item is-hero-avatar-item">
                        <div class="image is-128x128">
                            <img src="{{ $product->photo }}">
                        </div>
                    </div>
                    <div class="level-item is-hero-content-item">
                        <div>
                            <h1 class="title is-spaced"><b>{{ $product->size_title }}</b> </h1>
                                <p>{{ $product->price }} Eur</p>
{{--                            <div class="level">--}}
{{--                                <div class="level-left">--}}
{{--                                    <div class="level-item">--}}
{{--                                        <br><h3 class="subtitle">Paskutinis prisijungimas <b>04:20</b> iš--}}
{{--                                            <b>127.0.0.1</b>, Vilnius</h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="level-item">--}}
{{--                                        <button class="button is-small is-hero-button">Ne jūs?</button>--}}
{{--                                        <p>{{ $product->price }} Eur</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="level-right">
                    <div class="level-item">
                        <a href="{{ route('dashboard.product.edit', $product) }}" type="button" class="button is-medium is-hero-button">
                            <span class="icon">
                                <i class="fas fa-cog"></i>
                            </span>
                            <span>@lang('dashboard.button.edit')</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container-fluid">
            <div class="card is-card-table has-pagination has-table-borderless has-bottom-left-hidden">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span>@lang('dashboard.ingredient.title')</span>
                    </p>
                    <div class="card-header-icon has-button">
                        <a href="{{ route('dashboard.product.index') }}" product="button"
                            class="button is-small has-light-border">
                            <span class="icon"><i class="fas fa-retweet"></i></span>
                            <span>@lang('dashboard.link.refresh.title')</span>
                        </a>
                    </div>
                </header>
                <div class="card-content">
                    <div class="table-wrapper">
                        <table class="table is-fullwidth is-striped is-hoverable is-sortable">
                            <thead>
                            @empty(!$product)
                                <tr>
                                    <th>@lang('dashboard.data.title')</th>
                                    <th>@lang('dashboard.data.removable')</th>
{{--                                    <th>@lang('dashboard.data.description')</th>--}}
{{--                                    <th>@lang('dashboard.data.price')</th>--}}
{{--                                    <th>@lang('dashboard.data.discount')</th>--}}
{{--                                    <th>@lang('dashboard.data.photo')</th>--}}
{{--                                    <th>@lang('dashboard.data.priority')</th>--}}
{{--                                    <th>@lang('dashboard.data.type_id')</th>--}}
{{--                                    <th>@lang('dashboard.data.group_id')</th>--}}
{{--                                    <th>@lang('dashboard.data.created.at')</th>--}}
{{--                                    <th>@lang('dashboard.data.updated.at')</th>--}}
{{--                                    <th></th>--}}
                                </tr>
                            @endempty
                            </thead>
                            <tbody>
                            @forelse($product->ingredient as $ingredient)
                                <tr>
                                    <td>{{ $ingredient->title }}</td>
                                    <td>{{ $ingredient->removable_text }}</td>
{{--                                    <td>{{ $product->size_title }}</td>--}}
{{--                                    <td>{{ $product->short_description }}</td>--}}
{{--                                    <td>{{ $product->price }}</td>--}}
{{--                                    <td>{{ $product->discount }}</td>--}}
{{--                                    <td>--}}
{{--                                        @isset($product->photo)<img src="{{ $product->photo }}" alt="ProductPhoto" class="image is-16x16">@endisset--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $product->priority }}</td>--}}
{{--                                    <td>{{ $product->type_id }}</td>--}}
{{--                                    <td>{{ $product->group_id }}</td>--}}
{{--                                    <td>{{ $product->created_at }}</td>--}}
{{--                                    <td>{{ $product->updated_at }}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="buttons is-right">--}}
{{--                                            <a href="{{ route('dashboard.product.show', $product) }}"--}}
{{--                                                class="button is-small is-success" type="button" title="@lang('dashboard.button.edit')">--}}
{{--                                                <span class="icon">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                            <a href="{{ route('dashboard.product.edit', $product) }}"--}}
{{--                                                class="button is-small is-link" type="button" title="@lang('dashboard.button.edit')">--}}
{{--                                                <span class="icon">--}}
{{--                                                    <i class="fas fa-wrench"></i>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                            <form action="{{ route('dashboard.product.destroy', $product->id) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button class="button is-small is-danger" product="submit" title="@lang('dashboard.button.delete')">--}}
{{--                                                    <span class="icon">--}}
{{--                                                        <i class="fas fa-trash"></i>--}}
{{--                                                    </span>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>
                            @empty
                                <tr>
                                    <td>@lang('dashboard.product.empty')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
