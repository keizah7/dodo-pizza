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

@include('layouts.header')

<section class="cart">
    <h2 class="cart__title">Išsinešimui</h2>
    <div class="cart__content">
        <form action="" method="post">
            <div>
                <label>
                    Vardas
                    <input type="text" name="name">
                </label>
            </div>
            <div>
                <label>
                    Telefono numeris
                    <input type="text" name="phone">
                </label>
            </div>
            <div>
                <label for="">Komentaras</label><textarea name="comment" id="" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label for="">Išsinešimui</label>
                @foreach($pickups as $pickup)
                    <div>
                        <input type="radio" name="pickup_id" id=""> <b>{{ $pickup->title }}</b> {{ $pickup->address }}
                        <p>
                            {{ $pickup->description }}
                        </p>
                    </div><br>

                @endforeach
            </div>


            <button type="submit">Uzsakyti</button>
        </form>
    </div>
</section>
</body>
<script src="/js/app.min.js"></script>
</html>
