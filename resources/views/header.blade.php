<script>
    $(this).on('resize load', function(){
        var element = $('.navbar-header')
        if ($(window).width() >= 767) {
            element.toggleClass('bg-info', true)
        } else {
            element.toggleClass('bg-info', false)
        }
    })
</script>

<header class="bg-black header header-md navbar navbar-fixed-top-xs">
    <div class="navbar-header aside nav-md">
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
            <i class="icon-list"></i>
        </a>
        <a href="/" class="navbar-brand text-lt text-center">
            <i class="icon-earphones"></i>
            <img src="" alt="." class="hide">
            <span class="hidden-nav-xs m-l-sm">Podty</span>
        </a>
    </div>

        <ul class="nav navbar-nav hidden-xs">
            <li>
            </li>
        </ul>

        @if(Auth::user() && in_array(Route::getCurrentRoute()->uri(), ['/', 'discover']))
            <div style="margin-left:10px" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-sm bg-white btn-icon btn-find-cast">
                              <i class="fa fa-search"></i>
                          </button>
                        </span>
                        <input type="text" id="find-cast"
                               class="form-control input-sm no-border"
                               placeholder="Search podcasts"
                               style="width: 200%; !important;"
                        >
                    </div>
                </div>
            </div>
        @endif



    @if (Auth::guest())
        <div class="navbar-right">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li class="hidden-xs">
                    <a href="{{ url('login') }}">
                        <i class="fa fa-sign-in text-success" style="padding-right: 5px"></i>
                         Login
                    </a>
                </li>
                <li class="hidden-xs">
                    <a href="{{ url('register') }}">
                        <i class="fa fa-users text-success" style="padding-right: 5px"></i>
                        Register
                    </a>
                </li>
                <li class="dropdown">
                    <ul class="dropdown-menu animated fadeInRight">
                        <li>
                            <a href="{{ url('login') }}">
                                <i class="fa fa-sign-in text-success"></i>
                                Login
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('register') }}">
                                <i class="fa fa-users text-success"></i>
                                Register
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    @else
        <div class="navbar-right ">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li class="dropdown">
                    <div class="dropdown-toggle bg clear text-center" data-toggle="dropdown">
                        <span class="">
                            <img class="rounded thumb-wrapper thumb-md" src="https://www.gravatar.com/avatar/{{md5(strtolower(trim(Auth::user()->email)))}}?d=retro">
                        </span>
                    </div>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li class="visible-xs">
                            <a href="/podcasts">My Podcasts</a>
                        </li>
                        <li class="visible-xs">
                            <a href="/favorites">Favorites</a>
                        </li>
                        <li class="visible-xs">
                            <a href="/listening">Listening</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/profile">Profile</a>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="POST" id="logout-form">
                                {{ csrf_field() }}
                                <a href="#" id="logout-anchor">Logout</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    @endif
</header>
<script>
    $("a#logout-anchor").click(function(){
        $("#logout-form").submit();
    });

    $(document).ready(function() {
        var updatingCurrentTimeId = 0;
        var lastCurrentTime = 0;
        $(document).on('click', '.play-me', function(){

            var audio = document.getElementById('player');
            var source = document.getElementById('source');
            source.src = $(this).find('input').val();

            var inputData = $(this).find('input');


            audio.currentTime = inputData.attr('data-paused-at') || 0;

            $('#playing span').text(inputData.attr('data-title'));
            $('.podcast-image').attr('src', inputData.attr('data-image'));
            $('.podcast-image-texts').attr('hidden', true);
            audio.load();
            $('#div-player').attr('hidden', false);
            $('.musicbar').addClass('animate');
            audio.play();

            if (updatingCurrentTimeId) clearInterval(updatingCurrentTimeId);
            updatingCurrentTimeId = setInterval(function(){
                var audioTag = document.getElementsByTagName('audio')[0];

                if (!audioTag.currentSrc) return;

                var currentTime = Math.floor(audioTag.currentTime);
                if (!currentTime) return;
                if (currentTime == lastCurrentTime) return;

                lastCurrentTime = currentTime;

                $.ajax({
                    url: '/ajax/uptEpisode/' + inputData.attr('data-id') + '/' + currentTime
                });
            }, 25000);
        });
    });
</script>
