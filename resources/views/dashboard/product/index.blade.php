@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.product.title'),
        ],
        'button' => [
            __('dashboard.button.create'),
            'dashboard.product.create'],
    ])

    <section class="section">
        <div class="container-fluid">
            <div class="card is-card-table has-pagination has-table-borderless has-bottom-left-hidden">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span>@lang('dashboard.product.title')</span>
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
                            @empty(!$products)
                                <tr>
                                    <th>@lang('dashboard.data.id')</th>
                                    <th>@lang('dashboard.data.size_title')</th>
                                    <th>@lang('dashboard.data.description')</th>
                                    <th>@lang('dashboard.data.price')</th>
                                    <th>@lang('dashboard.data.discount')</th>
                                    <th>@lang('dashboard.data.photo')</th>
                                    <th>@lang('dashboard.data.priority')</th>
                                    <th>@lang('dashboard.data.type_id')</th>
                                    <th>@lang('dashboard.data.group_id')</th>
                                    <th>@lang('dashboard.data.created.at')</th>
                                    <th>@lang('dashboard.data.updated.at')</th>
                                    <th></th>
                                </tr>
                            @endempty
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->size_title }}</td>
                                    <td>{{ $product->short_description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>
                                        @isset($product->photo)<img src="{{ $product->photo }}" alt="ProductPhoto" class="image is-16x16">@endisset
                                    </td>
                                    <td>{{ $product->priority }}</td>
                                    <td>{{ $product->type_id }}</td>
                                    <td>{{ $product->group_id }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>

                                    <td>
                                        <div class="buttons is-right">
                                            <a href="{{ route('dashboard.product.edit', $product->id) }}"
                                                class="button is-small is-link" product="button" title="@lang('dashboard.button.edit')">
                                                <span class="icon">
                                                    <i class="fas fa-wrench"></i>
                                                </span>
                                            </a>
                                            <form action="{{ route('dashboard.product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="button is-small is-danger" product="submit" title="@lang('dashboard.button.delete')">
                                                    <span class="icon">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
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
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
