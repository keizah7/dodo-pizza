@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.ingredient.title'),
        ],
        'button' => [
            __('dashboard.button.create'),
            'dashboard.ingredient.create'],
    ])

    <section class="section">
        <div class="container-fluid">
            <div class="card is-card-table has-pagination has-table-borderless has-bottom-left-hidden">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span>@lang('dashboard.ingredient.title')</span>
                    </p>
                    <div class="card-header-icon has-button">
                        <a href="{{ route('dashboard.ingredient.index') }}" ingredient="button"
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
                            @empty(!$ingredients)
                                <tr>
                                    <th>@lang('dashboard.data.id')</th>
                                    <th>@lang('dashboard.data.title')</th>
                                    <th>@lang('dashboard.data.removable')</th>
                                    <th>@lang('dashboard.data.created.at')</th>
                                    <th>@lang('dashboard.data.updated.at')</th>
                                    <th></th>
                                </tr>
                            @endempty
                            </thead>
                            <tbody>
                            @forelse($ingredients as $ingredient)
                                <tr>
                                    <td>{{ $ingredient->id }}</td>
                                    <td>{{ $ingredient->title }}</td>
                                    <td>{{ $ingredient->removable_text }}</td>
                                    <td>{{ $ingredient->created_at }}</td>
                                    <td>{{ $ingredient->updated_at }}</td>

                                    <td>
                                        <div class="buttons is-right">
                                            <a href="{{ route('dashboard.ingredient.edit', $ingredient->id) }}"
                                                class="button is-small is-link" ingredient="button" title="@lang('dashboard.button.edit')">
                                                <span class="icon">
                                                    <i class="fas fa-wrench"></i>
                                                </span>
                                            </a>
                                            <form action="{{ route('dashboard.ingredient.destroy', $ingredient->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="button is-small is-danger" ingredient="submit" title="@lang('dashboard.button.delete')">
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
                                    <td>@lang('dashboard.ingredient.empty')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $ingredients->links() }}
            </div>
        </div>
    </section>
@endsection
