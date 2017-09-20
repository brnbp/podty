@extends('layouts.app')

@section('head')
    <style>
        .body {
            background-image: url(/img/welcome-low.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            height: 100vh;
        }

        h1, h2, h3 {
            color: white;
        }
        .buttons {
            padding-top: 5%;
            padding-bottom: 10%;
            float: none;
            margin: 0 auto;
        }
        .sign-in {
            margin-right: 50px;
        }

    </style>
@endsection

@section('content')
    <section class="vbox">
        @include('header')
        <section class="padding-top-50">
            <section class="hbox stretch">

                <div class="text-center" style="padding-top: 5%; height: 100%;">
                    <span style="text-shadow: 0px 0px 7px #333">
                        <h1>
                            <span class="bold">Podty.co</span>
                        </h1>

                        <h2>Welcome to the worldwide <br> podcast community</h2>

                        <br>
                        <p class="h3" style="color: white">
                            Discover new podcasts <br>
                            Find out what your friends are listening <br>
                            stay in touch with them
                        </p>
                    </span>

                    <br>

                    <a href="/discover" class="btn btn-dark btn-lg btn-rounded">Explore</a>
                    
                    <div class="buttons">
                        <a href="login" class="sign-in btn btn-lg btn-info btn-rounded">Login</a>
                        <a href="register" class="sign-up btn btn-lg btn-info btn-rounded">Register</a>
                    </div>
                </div>

            </section>
        </section>
    </section>
@endsection
