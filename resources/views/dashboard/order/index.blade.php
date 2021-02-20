@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.order.title'),
        ],
    ])

    <section class="section">
        <div class="container-fluid">
            <div class="card is-card-table has-pagination has-table-borderless has-bottom-left-hidden">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span>@lang('dashboard.order.title')</span>
                    </p>
                    <div class="card-header-icon has-button">
                        <a href="{{ route('dashboard.order.index') }}" order="button"
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
                            @empty(!$orders)
                                <tr>
                                    <th>@lang('dashboard.data.id')</th>
                                    <th>@lang('dashboard.data.status')</th>
                                    <th>@lang('dashboard.data.price')</th>
                                    <th>@lang('dashboard.data.client_id')</th>
                                    <th>@lang('dashboard.data.created.at')</th>
                                    <th>@lang('dashboard.data.updated.at')</th>
                                    <th></th>
                                </tr>
                            @endempty
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->price }} {{ config('app.currency') }}</td>
                                    <td>{{ $order->client_id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>

                                    <td>
                                        <div class="buttons is-right">
                                            <a href="{{ route('dashboard.order.show', $order) }}"
                                               class="button is-small is-success" type="button"
                                               title="@lang('dashboard.button.edit')">
                                                <span class="icon">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>@lang('dashboard.order.empty')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </section>
@endsection
