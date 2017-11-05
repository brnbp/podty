<div class="sharer-container text-center ">
    <a href="#" class="sharer button" data-sharer="twitter"
       data-title="{{$title}}"
       data-via="podtyco"
       data-hashtags="podty"
       data-url="{{$url}}">
        <i class="fa fa-twitter fa-lg"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="facebook"
            data-url="{{$url}}">
        <i class="fa fa-facebook fa-lg"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="linkedin"
            data-url="{{$url}}">
        <i class="fa fa-linkedin fa-lg"></i>
    </a>
    
    @if(isset($split) && $split == true)
        <div class="sharer-split"></div>
    @endif
    
    <a href="#" class="sharer button" data-sharer="whatsapp"
            data-title="Podty - {{$title}}"
            data-url="{{$url}}">
        <i class="fa fa-whatsapp fa-lg"></i>
    </a>

    <a href="#" class="sharer button" data-sharer="reddit"
            data-url="{{$url}}">
        <i class="fa fa-reddit fa-lg"></i>
    </a>
    
    <a href="#" class="sharer button" data-sharer="pocket"
            data-title="Podty - {{$title}}"
            data-url="{{$url}}">
        <i class="fa fa-get-pocket fa-lg"></i>
    </a>
</div>
