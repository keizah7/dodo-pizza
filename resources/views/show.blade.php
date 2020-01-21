<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>&#x1F355; Dodo Pizza Vilnius | Pristatymas per 60 minučių arba pica nemokamai</title>
        <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    </head>
    <body>

    <div class="add-to-cart__close">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M9.84606 12.4986L0.552631 3.20519C-0.1806 2.47196 -0.1806 1.28315 0.552631 0.549923C1.28586 -0.183308 2.47466 -0.183308 3.20789 0.549923L12.5013 9.84335L21.792 0.552631C22.5253 -0.1806 23.7141 -0.1806 24.4473 0.552631C25.1805 1.28586 25.1805 2.47466 24.4473 3.20789L15.1566 12.4986L24.45 21.792C25.1832 22.5253 25.1832 23.7141 24.45 24.4473C23.7168 25.1805 22.528 25.1805 21.7947 24.4473L12.5013 15.1539L3.20519 24.45C2.47196 25.1832 1.28315 25.1832 0.549923 24.45C-0.183308 23.7168 -0.183308 22.528 0.549923 21.7947L9.84606 12.4986Z"
                fill="white"></path>
        </svg>
    </div>
    <div class="add-to-cart__content">
        <div class="btn btn--white add-to-cart__back">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.0005 10.9988H7.83047L12.7105 6.11875C13.1005 5.72875 13.1005 5.08875 12.7105 4.69875C12.3205 4.30875 11.6905 4.30875 11.3005 4.69875L4.71047 11.2888C4.32047 11.6788 4.32047 12.3087 4.71047 12.6987L11.3005 19.2888C11.6905 19.6788 12.3205 19.6788 12.7105 19.2888C13.1005 18.8988 13.1005 18.2687 12.7105 17.8787L7.83047 12.9987H19.0005C19.5505 12.9987 20.0005 12.5487 20.0005 11.9988C20.0005 11.4488 19.5505 10.9988 19.0005 10.9988Z"
                    fill="black"></path>
            </svg>
        </div>
        <div class="btn btn--white add-to-cart__cart">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.78998 0.458405L7.67016 0L4.53467 7.44928H6.21459C6.77469 7.44928 7.11045 7.22008 7.33441 6.76168L9.35009 1.94842C9.57405 1.37522 9.35009 0.687608 8.78998 0.458405Z"
                    fill="black"></path>
                <path
                    d="M17.8778 0L16.8698 0.458405C16.3097 0.687608 16.0857 1.37522 16.3097 1.94842L18.2136 6.76168C18.4375 7.22008 18.7737 7.44928 19.2216 7.44928H20.9015L17.8778 0Z"
                    fill="black"></path>
                <path
                    d="M23.5931 8.93018H19.4938H6.05557H1.8445H0V11.7883C0 12.4759 0.447928 12.9343 1.11982 12.9343H24.8779C25.5497 12.9343 25.9977 12.4759 25.9977 11.7883V8.93018H23.5931Z"
                    fill="black"></path>
                <path
                    d="M1.69043 14.5334L3.19141 25.0772C3.3032 25.6504 3.75152 25.994 4.31123 25.994H21.6861C22.2462 25.994 22.6941 25.5356 22.8059 25.0772L24.3069 14.5334H1.69043ZM17.0085 22.3196H8.87862C8.3224 22.3196 7.98898 21.8644 7.98898 21.4091C7.98898 20.9539 8.4338 20.4987 8.87862 20.4987H17.0085C17.5643 20.4987 17.8981 20.9539 17.8981 21.4091C17.8981 21.8644 17.5647 22.3196 17.0085 22.3196ZM18.3821 18.5077H7.61519C7.05935 18.5077 6.72554 18.0525 6.72554 17.5973C6.72554 17.1421 7.17036 16.6868 7.61519 16.6868H18.3821C18.938 16.6868 19.2718 17.1421 19.2718 17.5973C19.2718 18.0525 18.938 18.5077 18.3821 18.5077Z"
                    fill="black"></path>
            </svg>
        </div>
        <img class="add-to-cart__img"
            src="https://dodopizza-a.akamaihd.net/static/Img/Products/Pizza/lt-LT/99f8eca7-754a-4810-99b2-b64e9348a022.jpg"
            alt="Pica">
        <div class="add-to-cart__info">
            <h3>{{ $group->title }}</h3>
            <p class="muted">25cm. Tradicinė tešla, 640g</p>
            <p>
                @foreach($group->product->first()->ingredient as $ingredient)
                    {{ $ingredient->title }}{{ $loop->last ? '' : ', ' }}
                @endforeach
            </p>
        </div>
        <div class="add-to-cart__box">
            @foreach($group->product as $product)

                <span
                    {{ $loop->first ? ' class=is-active' : '' }}
                    style="width:{{ 100 / $group->product->count()  }}%"><a href="?id={{$product->id}}">{{ $product->size_title }}</a></span>
{{--                <span style="width:33.333%" class="is-active">Maža</span>--}}
{{--                <span style="width:33.333%">Vidutinė</span>--}}
{{--                <span style="width:33.333%">Didelė</span>--}}
            @endforeach
        </div>
        <div class="add-to-cart__add"><a href="" class="btn btn--block">Įdėti į krepšelį už 8,50</a></div>
    </div>
    </div>
    <div class="overlay"></div>
    </body>
    <script src="/js/app.min.js"></script>
</html>

