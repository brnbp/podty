@extends('layouts.app')
@section('title', 'Categories - Podty')

@section('content')
    <section class="vbox">
        @include('header')
        <section class="padding-top-50">
            <section class="hbox stretch">
                
                @include('partials.bar.left')
                
                <section id="content">
                    <section class="hbox stretch">
                        <section class="vbox">
                            <section class="scrollable padder-lg">
                                <h1 class="font-thin m-b" id="home-title">Categories</h1>
                                    @include('categories.partials.category')
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
    <script async type="text/javascript" src="js/find-podcasts.js"></script>
    <script async type="text/javascript" src="js/partials/leftbar.js?t={{time()}}"></script>
@endsection
