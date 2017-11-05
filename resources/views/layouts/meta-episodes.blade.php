<!-- Search Engine -->
<meta name="description" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta name="image" content="{{$podcast['episodes']['image'] ?: $podcast['thumbnail_600']}}">

<!-- Schema.org for Google -->
<meta itemprop="name" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta itemprop="description" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta itemprop="image" content="{{$podcast['episodes']['image'] ?: $podcast['thumbnail_600']}}">

<!-- Twitter -->
<meta name="twitter:card" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta name="twitter:title" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta name="twitter:description" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta name="twitter:site" content="https://podty.co/episodes/{{$podcast['episodes']['id']}}">
<meta name="twitter:creator" content="Podty - {{$podcast['name']}}">
<meta name="twitter:image:src" content="{{$podcast['episodes']['image'] ?: $podcast['thumbnail_600']}}">
<!-- Twitter - Article -->

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="{{$podcast['name']}} - {{$podcast['episodes']['title']}}">
<meta name="og:description" content="{{$podcast['episodes']['title']}}">
<meta name="og:image" content="{{$podcast['episodes']['image'] ?: $podcast['thumbnail_600']}}">
<meta name="og:url" content="https://podty.co/episodes/{{$podcast['episodes']['id']}}">
<meta name="og:site_name" content="Podty - {{$podcast['name']}}">
<meta name="og:type" content="article">
<!-- Open Graph - Article -->

