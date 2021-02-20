@if ($paginator->hasPages())
    <div class="notification is-in-card is-lower has-bottom-radius ">
        <div class="buttons has-addons">
            @if ($paginator->onFirstPage())
                <button class="button" disabled>
                    <span class="icon">
                        <i class="fas fa-caret-left"></i>
                    </span>
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="button">
                    <span class="icon">
                        <i class="fas fa-caret-left"></i>
                    </span>
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <button class="button" disabled>
                        <span class="icon">{{ $element }}</span>
                    </button>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <button class="button is-active">
                            <span class="icon">{{ $page }}</span>
                        </button>
                        @else
                        <a href="{{ $url }}" class="button">
                            <span class="icon">{{ $page }}</span>
                        </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="button">
                    <span class="icon">
                        <i class="fas fa-caret-right"></i>
                    </span>
                </a>
            @else
                <button class="button" disabled>
                    <span class="icon">
                        <i class="fas fa-caret-right"></i>
                    </span>
                </button>
            @endif
        </div>
    </div>
@endif
