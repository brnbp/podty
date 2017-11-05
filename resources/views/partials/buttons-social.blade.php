@section('head')
    <link rel="stylesheet" href="/css/sharer.css" type="text/css" />
@endsection

<div class="sharer-container text-center">
    <a href="#" class="sharer button" data-sharer="twitter"
       data-title="{{$title}}"
       data-via="podtyco"
       data-hashtags="podty"
       data-url="{{$url}}">
        <i class="fa fa-twitter"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="facebook"
            data-url="{{$url}}">
        <i class="fa fa-facebook"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="linkedin"
            data-url="{{$url}}">
        <i class="fa fa-linkedin"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="whatsapp"
            data-title="Podty - {{$title}}"
            data-url="{{$url}}">
        <i class="fa fa-whatsapp"></i>
    </a>
    
    {{--<a href="#" class="sharer button" data-sharer="telegram"
            data-title="Podty - {{$title}}"
            data-url="{{$url}}">
        <i class="fa fa-telegram"></i>
    </a>--}}
    
    <a href="#" class="sharer button" data-sharer="reddit"
            data-url="{{$url}}">
        <i class="fa fa-reddit"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="pocket"
            data-title="Podty - {{$title}}"
            data-url="{{$url}}">
        <i class="fa fa-get-pocket"></i>
    </a>
</div>

@section('footer-scripts')
    <script async src="/js/sharer.min.js"></script>
@endsection
