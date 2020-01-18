@extends('layouts.dashboard')

@section('content')
    @include('layouts.breadcrumb', ['links' => [
        __('dashboard.aside.common.title'),
        __('dashboard.home.title'),
        ]])

    <section class="hero is-main-hero">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item is-hero-avatar-item">
                        <div class="hero-avatar">
                            <img src="/img/avatar.jpeg">
                        </div>
                    </div>
                    <div class="level-item is-hero-content-item">
                        <div>
                            <h1 class="title is-spaced"><b>{{ auth::user()->email }}</b></b></h1>
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <br><h3 class="subtitle">Paskutinis prisijungimas <b>04:20</b> iš
                                            <b>127.0.0.1</b>, Vilnius</h3>
                                    </div>
                                    <div class="level-item">
                                        <button class="button is-small is-hero-button">Ne jūs?</button>
                                    </div>
                                </div>
                            </div>

                            <p>Jus turite <b>1,154</b> naujas peržiūras ir <b>12</b> naujų komentarų</p>
                        </div>
                    </div>
                </div>

                <div class="level-right">
                    <div class="level-item">
                        <button type="button" class="button is-medium is-hero-button">
            <span class="icon">
            <i class="fas fa-cog"></i>
            </span>
                            <span>Redaguoti profilį</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container-fluid">
            <div class="columns is-multiline">
                <div class="column is-one-third-tablet is-one-fifth-desktop">
                    <div class="card is-widget-state-warning">
                        <div class="notification is-card-toolbar is-upper has-upper-radius is-compact">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div>
                                            <span class="icon"><i class="fas fa-arrow-up"></i></span> <span><b>60</b> per <b>Birželis, 2019</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <div>
                                            <button class="button is-small">
                                                <span class="icon"><i class="fas fa-cog"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item"><span class="icon is-card-widget-icon"><i
                                                class="fas fa-fire"></i></span></div>
                                    <div class="level-item">
                                        <div class="card-widget">
                                            <div class="heading is-trending-up">
                                                Komentarai
                                                <span class="icon"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <div class="title">
                                                12
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-one-third-tablet is-one-fifth-desktop">
                    <div class="card is-widget-state-primary">
                        <div class="notification is-card-toolbar is-upper has-upper-radius is-compact">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div>
                                            <span class="icon"><i class="fas fa-arrow-up"></i></span> <span><b>1,977</b> per <b>Birželis, 2019</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <div>
                                            <button class="button is-small">
                                                <span class="icon"><i class="fas fa-cog"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item"><span class="icon is-card-widget-icon"><i
                                                class="fas fa-eye"></i></span></div>
                                    <div class="level-item">
                                        <div class="card-widget">
                                            <div class="heading is-trending-up">
                                                Peržiūros
                                                <span class="icon"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <div class="title">
                                                1,154
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-one-third-tablet is-one-fifth-desktop">
                    <div class="card is-widget-state-success">
                        <div class="notification is-card-toolbar is-upper has-upper-radius is-compact">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div>
                                            <span class="icon"><i class="fas fa-arrow-up"></i></span> <span><b>679</b> per <b>Birželis, 2019</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <div>
                                            <button class="button is-small">
                                                <span class="icon"><i class="fas fa-cog"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item"><span class="icon is-card-widget-icon"><i
                                                class="fas fa-shopping-basket"></i></span></div>
                                    <div class="level-item">
                                        <div class="card-widget">
                                            <div class="heading is-trending-up">
                                                Pardavimai
                                                <span class="icon"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <div class="title">
                                                729 €
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-one-third-tablet is-one-fifth-desktop">
                    <div class="card is-widget-state-info">
                        <div class="notification is-card-toolbar is-upper has-upper-radius is-compact">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div>
                                            <span class="icon"><i class="fas fa-arrow-down"></i></span> <span><b>980</b> per <b>Birželis, 2019</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <div>
                                            <button class="button is-small">
                                                <span class="icon"><i class="fas fa-cog"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item"><span class="icon is-card-widget-icon"><i
                                                class="fas fa-user-friends"></i></span></div>
                                    <div class="level-item">
                                        <div class="card-widget">
                                            <div class="heading is-trending-down">
                                                Klientai
                                                <span class="icon"><i class="fas fa-arrow-down"></i></span>
                                            </div>
                                            <div class="title">
                                                977
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-one-third-tablet is-one-fifth-desktop">
                    <div class="card is-widget-state-danger">
                        <div class="notification is-card-toolbar is-upper has-upper-radius is-compact">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div><span><b>5</b> atšaukti</span></div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <div>
                                            <span class="tag is-danger">Dėmėsio</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item"><span class="icon is-card-widget-icon"><i
                                                class="fas fa-bell"></i></span></div>
                                    <div class="level-item">
                                        <div class="card-widget">
                                            <div class="heading">
                                                Pranešimų
                                            </div>
                                            <div class="title">
                                                12
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
