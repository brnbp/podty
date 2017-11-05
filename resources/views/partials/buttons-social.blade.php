@section('head')
    <link rel="stylesheet" href="/css/sharer.css" type="text/css" />
@endsection

<button class="sharer button" data-sharer="twitter"
        data-title="{{$title}}"
        data-via="podtyco"
        data-hashtags="podty"
        data-url="{{$url}}">
    
    <i class="fa fa-twitter"></i>
</button>

<button class="sharer button" data-sharer="facebook"
        data-url="{{$url}}">
    <i class="fa fa-facebook"></i>
</button>

<button class="sharer button" data-sharer="linkedin"
        data-url="{{$url}}">
    <i class="fa fa-linkedin"></i>
</button>

<button class="sharer button" data-sharer="whatsapp"
        data-title="Podty - {{$title}}"
        data-url="{{$url}}">
    <i class="fa fa-whatsapp"></i>
</button>

<button class="sharer button" data-sharer="telegram"
        data-title="Podty - {{$title}}"
        data-url="{{$url}}">
    <i class="fa fa-telegram"></i>
</button>

<button class="sharer button" data-sharer="reddit"
        data-url="{{$url}}">
    <i class="fa fa-reddit"></i>
</button>

<button class="sharer button" data-sharer="pocket"
        data-title="Podty - {{$title}}"
        data-url="{{$url}}">
    <i class="fa fa-get-pocket"></i>
</button>

@section('footer-scripts')
    <script async src="/js/sharer.min.js"></script>
@endsection
