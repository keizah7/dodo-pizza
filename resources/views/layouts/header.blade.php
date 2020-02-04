<header class="header from-lg">
    <div class="header__content from-lg">
        <div class="grid">
            <a href="{{ route('index') }}"><img src="/img/logotipas.png"
                    alt="Logotipas"></a>
            <div class="header__text">
                <p>Nemokamas picų pristatymas <span>Vilnius</span></p>
                <p class="muted">60 minučių arba sekanti pica nemokamai</p>
            </div>
            <div class="header__contacts">
                <p class="muted">Skambinkite</p>
                <a href="tel:863511555">8 635 11 555</a>
            </div>
            <div class="header__log-in">
                <a href="{{ route('dashboard.home') }}"
                    class="btn btn--white btn--square">
                    @guest
                        Prisijungti
                    @else
                        {{ Auth::user()->name }}
                    @endguest
                </a>
            </div>
        </div>
    </div>
</header>
<nav class="nav">
    <div class="nav__content till-lg">
            <div class="header__logo">
                <a href="{{ route('index') }}"><img src="/img/logo.jpg"
                        alt="Logotipas"></a>
                <a href="{{ route('index') }}"><img src="/img/logo-black.jpg"
                        alt="Logotipas"></a>
            </div>
            <div class="header__trigger">
                <img src="/img/toggle.svg"
                    alt="Atidaryti meniu">
                <img src="/img/close.svg"
                    alt="Uždaryti meniu">
        </div>

    </div>
    <div class="nav__content from-lg">
        <div class="nav__links">
            <div class="nav__logo"><a href="/"><img src="/img/dodo.png"
                        alt="Logo"></a></div>
            <a href="#">Akcijos</a>
            <a href="#">Kontaktai</a>
            <a class="live"
                href="http://dodopizza.lt">Tiesioginė transliacija</a>
        </div>

        <a href="{{ route('cart.index') }}"
            class="btn">Krepšelis</a>
    </div>
</nav>

<div class="mobile-nav">
    <div class="mobile-nav__content">
        <div class="mobile-nav__location">
            <img src="https://dodopizza-a.akamaihd.net/site-static/dist/83f0dd86f76b35592e4f.svg"
                alt="location">
            <p>Vilnius<span>Pakeisti</span></p>
        </div>
        <div class="mobile-nav__links">
            <a href="#">Akcijos</a>
            <a href="#">Kontaktai</a>
            <a href="http://dodopizza.lt">Tiesioginė transliacija</a>
            <a href="{{ route('dashboard.home') }}">
                @guest
                    Prisijungti
                @else
                    {{ Auth::user()->name }}
                @endguest
            </a>
            <a href="{{ route('cart.index') }}">Krepšelis</a>
        </div>
        <div class="mobile-nav__contacts">
            <img src="https://dodopizza-a.akamaihd.net/site-static/dist/7235e08baa1f74293b90.svg"
                alt="phone">
            <p>8 635 11 555<span>Skambinkite</span></p>
        </div>
    </div>
</div>
