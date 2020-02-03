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
                                <p>{{ $product->price }} {{ config('app.currency') }}</p>

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
                        <a href="{{ route('dashboard.product.index') }}" type="button"
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
                                </tr>
                            @endempty
                            </thead>
                            <tbody>
                            @forelse($product->ingredient as $ingredient)
                                <tr>
                                    <td>{{ $ingredient->title }}</td>
                                    <td>{{ $ingredient->removable_text }}</td>
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
