<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
            <ul>
                @foreach ($links as $link)
                    <li>{{ $link }}</li>
                @endforeach
            </ul>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="buttons is-right">
                    @if(isset($button))
                        <a href="{{ route($button[1]) }}" class="button is-primary"><span class="icon"><i class="fas fa-plus"></i></span>
                    @else
                        <a href="{{ route('dashboard.home') }}" class="button is-info">
                    @endif
                        <span>{{ isset($button) ? $button[0] : __('dashboard.home.title')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
