@extends('layouts.app')
@section('title', $podcast['episodes']['title'] . ' - Podty')

@include('layouts.meta', [
    'creator' => 'Podty' . $podcast['episodes']['title'],
    'title' => $podcast['name'] . ' - ' . $podcast['episodes']['title'],
    'url' => 'https://podty.co/episodes/' . $podcast['episodes']['id'],
    'image' => $podcast['episodes']['image'] ?: $podcast['thumbnail_600'],
])

@section('content')
    <section class="vbox">
        @include('header')
        <section class="padding-top-50">
            <section class="hbox stretch">
                @include('partials.bar.left')
                <section id="content">
                    <section class="hbox stretch">
                        <section class="scrollable">
                            <div class="text-center">
                                <div class="
                                        col-lg-6 col-lg-offset-3
                                        col-md-4 col-md-offset-4
                                        col-sm-6 col-sm-offset-4
                                        ">
                                    <h2>
                                        <a href="/podcasts/{{$podcast['slug']}}">{{$podcast['name']}}</a>
                                    </h2>
                                    <h3>
                                        {{$podcast['episodes']['title']}}
                                        <small>
                                            <br>
                                            {{(new \DateTime($podcast['episodes']['published_at']))->format('d/m/Y H:i')}}
                                        </small>
                                    </h3>

                                    <br>
                                    <img src="{{$podcast['episodes']['image'] ?: $podcast['thumbnail_600']}}" width="250">
                                    <hr>
                                    <audio controls id="player" style="width: 100%">
                                        <source src="{{$podcast['episodes']['media_url']}}" id="source">
                                    </audio>
                                </div>
                            </div>
                        </section>
                        
                        @include('partials.buttons-social', [
                            'title' => $podcast['name'] . ' - ' . $podcast['episodes']['title'],
                            'url' => 'https://podty.co/episodes/' . $podcast['episodes']['id']
                        ])
    
                        @include('partials.connected')
                    </section>
                </section>
            </section>
        </section>
    </section>

    <script>
        var updatingCurrentTimeId = 0;
        var lastCurrentTime = 0;
        var episodeId = '{{$podcast['episodes']['id']}}';

        $('#player')[0].currentTime = '{{$podcast['episodes']['paused_at'] ?? 0}}';

        if (updatingCurrentTimeId) clearInterval(updatingCurrentTimeId);
        updatingCurrentTimeId = setInterval(function(){
            var audioTag = document.getElementsByTagName('audio')[0];

            if (!audioTag.currentSrc) return;

            var currentTime = Math.floor(audioTag.currentTime);
            if (!currentTime) return;
            if (currentTime == lastCurrentTime) return;

            lastCurrentTime = currentTime;
            $.ajax({
                url: '/ajax/uptEpisode/' + episodeId + '/' + currentTime
            });
        }, 25000);
    </script>

@endsection
