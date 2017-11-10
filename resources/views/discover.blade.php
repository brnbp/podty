@extends('layouts.app')
@section('title', "$title - Podty")

@section('content')
    <section class="vbox">
        @include('header')
        <section class="padding-top-50">
            <section class="hbox stretch">

                @include('partials.bar.left')

                <section id="content">
                    <section class="hbox stretch">
                        <section>
                            <section class="vbox">
                                <section class="scrollable padder-lg" id="bjax-target">
                                    <h2 class="font-thin m-b" id="home-title">{{$title}}</h2>
                                    <div class="row row-sm podcasts-episodes-home">
                                        @include('partials.podcasts')
                                    </div>
                                    <div id="loading" hidden>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="header-title pulse-effect">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-xs-5" style="margin-right: 50px;">
                                                <div class="image-shadow pulse-effect"></div>
                                                <div class="subtitle pulse-effect"></div>
                                                <div class="title pulse-effect"></div>
                                            </div>
                                            <div class="col-md-2 col-xs-4" style="margin-right: 50px;">
                                                <div class="image-shadow pulse-effect"></div>
                                                <div class="subtitle pulse-effect"></div>
                                                <div class="title pulse-effect"></div>
                                            </div>
                                            <div class="col-md-2 hidden-xs" style="margin-right: 20px;">
                                                <div class="image-shadow pulse-effect"></div>
                                                <div class="subtitle pulse-effect"></div>
                                                <div class="title pulse-effect"></div>
                                            </div>
                                            <div class="col-md-2 hidden-xs"></div>
                                            <div class="col-md-2 hidden-xs"></div>
                                            <div class="col-md-2 hidden-xs"></div>
                                        </div>
                                        <style>
                                            .header-title {
                                                background: darkgrey;
                                                width: 200px;
                                                height: 40px;
                                                margin-bottom: 20px;
                                                border-radius: 4%;
                                            }
                                            .image-shadow {
                                                background-color: darkgrey;
                                                width: 130px;
                                                height:130px;
                                                border-radius: 3%;
                                                margin-bottom: 20px;
                                            }
                                            .subtitle, .title {
                                                background-color: darkgrey;
                                                width: 110px;
                                                height: 15px;
                                                margin: 5px 0 0 5px;
                                                border-radius: 4%;
                                            }
                                            .pulse-effect {
                                                background: linear-gradient(to right, #a9a9a9 8%, #9c9c9c 18%, #a9a9a9 33%);
                                                animation-duration: 1s;
                                                animation-fill-mode: forwards;
                                                animation-iteration-count: infinite;
                                                animation-name: pulse;
                                                animation-timing-function: linear;
                                                background-size: 800px 104px;
                                            }
                                            @keyframes pulse {
                                                0%{
                                                    background-position: -468px 0;
                                                }
                                                100%{
                                                    background-position: 468px 0;
                                                }
                                            }
                                        </style>
                                    </div>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

                @include('partials.connected')

            </section>
        </section>
    </section>
@endsection

@section('footer-scripts')
    @if (\Illuminate\Support\Facades\Auth::user())
        <script async type="text/javascript" src="js/partials/leftbar.js"></script>
    @endif
    
    <script async type="text/javascript" src="js/find-podcasts.js"></script>
@endsection
