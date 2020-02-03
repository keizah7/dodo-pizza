@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.order.title'),
            $order->size_title,
        ],
        'button' => [
            __('dashboard.button.back'),
            'dashboard.order.index'],
    ])

    <section class="hero is-main-hero">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item is-hero-content-item">
                        <div>
                            <h1 class="title is-spaced"><b>{{ $order->client->name }}</b></h1>
                            <p>{{ $order->client->comment }}
                                <i>{{ $order->client->email }} {{ $order->client->phone }}</i></p>
                            <p>{{ $order->price }} {{ config('app.currency') }} ({{ $order->status }})</p>

                            <p>{{ $order->description }}</p>
                        </div>
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
                        <span>@lang('dashboard.product.title')</span>
                    </p>
                    <div class="card-header-icon has-button">
                        <a href="{{ route('dashboard.order.index') }}" type="button"
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
                                @empty(!$order->products)
                                    <tr>
                                        <th>@lang('dashboard.data.title')</th>
                                        <th>@lang('dashboard.data.size_title')</th>
                                        <th>@lang('dashboard.data.photo')</th>
                                    </tr>
                                @endempty
                                </thead>
                                <tbody>
                                @forelse($order->products as $order)
                                    <tr>
                                        <td>{{ $order->product->group->title }}</td>
                                        <td>{{ $order->product->size_title }}</td>
                                        <td>
                                            @isset( $order->product->photo)<img src="{{  $order->product->photo }}" alt="ProductPhoto" class="image is-16x16">@endisset
                                        </td>
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
