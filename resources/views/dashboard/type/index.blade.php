@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', [
        'links' => [
            __('dashboard.aside.data.title'),
            __('dashboard.type.title'),
        ],
        'button' => [
            __('dashboard.button.create'),
            'dashboard.type.create'],
    ])

    <section class="section">
        <div class="container-fluid">
            <div class="card is-card-table has-pagination has-table-borderless has-bottom-left-hidden">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span>@lang('dashboard.type.title')</span>
                    </p>
                    <div class="card-header-icon has-button">
                        <a href="{{ route('dashboard.type.index') }}" type="button"
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
                            @empty(!$types)
                                <tr>
                                    <th>@lang('dashboard.data.id')</th>
                                    <th>@lang('dashboard.data.title')</th>
                                    <th>@lang('dashboard.data.priority')</th>
                                    <th>@lang('dashboard.data.created.at')</th>
                                    <th>@lang('dashboard.data.updated.at')</th>
                                    <th></th>
                                </tr>
                            @endempty
                            </thead>
                            <tbody>
                            @forelse($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->title }}</td>
                                    <td>{{ $type->priority }}</td>
                                    <td>{{ $type->created_at }}</td>
                                    <td>{{ $type->updated_at }}</td>

                                    <td>
                                        <div class="buttons is-right">
                                            <a href="{{ route('dashboard.type.edit', $type->id) }}"
                                                class="button is-small is-link" type="button" title="@lang('dashboard.button.edit')">
                                                <span class="icon">
                                                    <i class="fas fa-wrench"></i>
                                                </span>
                                            </a>
                                            <form action="{{ route('dashboard.type.destroy', $type->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="button is-small is-danger" type="submit" title="@lang('dashboard.button.delete')">
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
                                    <td>@lang('dashboard.type.empty')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $types->links() }}
            </div>
        </div>
    </section>
@endsection
