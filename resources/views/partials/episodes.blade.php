@foreach($episodes as $episode)
    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
        <div class="item">
            <div class="pos-rlt">
                <div class="bottom">
                    @if($episode['episode']['duration'])
                        <span class="badge bg-info m-l-sm m-b-sm">
                              {{$episode['episode']['duration']}}
                          </span>
                    @endif
                </div>
                
                <div class="item-overlay opacity r r-2x bg-black">
                    <a href="#" class="center text-center play-me m-t-n active" data-toggle="class">
                        <input type="hidden"
                               value="{{$episode['episode']['media_url']}}"
                               data-title="{{$episode['episode']['title']}}"
                               data-id="{{$episode['episode']['id']}}"
                               data-image="{{$episode['episode']['image']}}"
                               data-paused-at="{{$episode['episode']['paused_at'] ?? 0}}"
                        >
                        <i class="icon-control-play text-active i-2x"></i>
                        <i class="icon-control-pause text i-2x"></i>
                    </a>
                    
                    <div class="top m-r-sm m-t-sm">
                        @if(isset($favorite))
                            <a href="#" class="pull-right btn-unfav-ep" data-toggle="class">
                                <i class="fa fa-heart-o text-active"></i>
                                <i class="fa fa-heart text text-danger"></i>
                            </a>
                        @else
                            <a href="#" class="pull-right btn-fav-ep" data-toggle="class">
                                <i class="fa fa-heart-o text"></i>
                                <i class="fa fa-heart text-active text-danger"></i>
                            </a>
                        @endif
                    </div>
                    <div class="bottom">
                        @if(isset($removable))
                            <a href="#" class="pull-left m-l-sm m-b-sm button-rmv-ep">
                                <i class="fa fa-times"></i>
                            </a>
                        @endif
                        <a href="/episodes/{{$episode['episode']['id']}}" class="pull-right m-r-sm m-b-sm" target="_blank">
                            <i class="icon-action-redo"></i>
                        </a>
                    </div>
                </div>
                <a href="#">
                    <img src="{{$episode['episode']['image'] ?: $episode['thumbnail_100'] ?? $episode['feed']['thumbnail_100']}}" class="r r-2x img-full">
                </a>
            </div>
            <div class="padder-v">
                <a href="#" class="text-ellipsis" data-toggle="modal" data-target="#myModal{{$episode['episode']['id']}}">{{$episode['episode']['title']}}</a>
                <a href="#" class="text-ellipsis text-xs text-muted" data-toggle="modal" data-target="#myModal{{$episode['episode']['id']}}">
                    {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $episode['episode']['published_at'] ?? $episode['episode']['published_date'])->diffForHumans()}}
                </a>
                <a href="/podcasts/{{$episode['slug'] ?? $episode['feed']['slug']}}" class="text-ellipsis">{{$episode['name'] ?? $episode['feed']['name']}}</a>
            </div>
            
            <div class="modal fade" id="myModal{{$episode['episode']['id']}}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark">
                        <div class="modal-body" style="overflow: scroll; max-height: 300px;">
                            <h4 class="modal-title">{{$episode['episode']['title']}}</h4>
                            <hr>
                            <?= !empty($episode['episode']['content']) ? $episode['episode']['content'] : $episode['episode']['summary']?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-rounded" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
