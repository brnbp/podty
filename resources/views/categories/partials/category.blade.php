@foreach($categories as $category)
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
        <div class="item">
            <div class="pos-rlt">
                <div class="bottom">
                    <span class="badge bg-info m-l-sm m-b-sm">
                        {{$category['counter']}} Podcasts
                    </span>
                </div>
                <div class="item-overlay opacity r r-2x bg-black">
                    <div class="center text-center m-t-n">
                        <a href="/categories/{{$category['slug']}}">
                            <i class="icon-action-redo i-2x"></i>
                        </a>
                    </div>
                </div>
                <a href="#">
                    <img src="{{$category['thumbnail']}}" class="r r-2x img-full">
                </a>
            </div>
            <div class="padder-v">
                <a href="/categories/{{$category['slug']}}" class="text-ellipsis">
                    {{$category['name']}}
                </a>
            </div>
        </div>
    </div>
@endforeach
