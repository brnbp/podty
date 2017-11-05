
<aside class="bg-black dk aside hidden-print" id="nav">
    <section class="vbox">
        <section>
            <div>
                <nav class="nav-primary hidden-xs">
                    <ul class="nav bg">
                        <li>
                            <a href="/">
                                <i class="icon-list icon text-info"></i>
                                <span class="font-bold">My Episodes</span>
                            </a>
                        </li>
                        <li>
                            <a href="/podcasts">
                                <i class="icon-folder icon text-info"></i>
                                <span class="font-bold">My Podcasts</span>
                            </a>
                        </li>
                        <li>
                            <a href="/favorites">
                                <i class="icon-heart icon text-info"></i>
                                <span class="font-bold">Favorites</span>
                            </a>
                        </li>
                        <li>
                            <a href="/listening">
                                <i class="icon-clock icon text-info"></i>
                                <span class="font-bold">Listening</span>
                            </a>
                        </li>
                        <li>
                            <a href="/discover">
                                <i class="icon icon-fire text-info"></i>
                                <span class="font-bold">Discover</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div style="height: 70%;overflow: auto;" class="hidden-xs">
                <nav class="nav-primary" style="margin-top: 5px;">
                    <h4 class="text-center">Podcasts</h4>
                    <ul class="nav" id="podcasts-list-left-side">
                    </ul>
                </nav>
            </div>
        </section>
    </section>
</aside>
@if(Auth::user())
    <script>
        $.ajax({
            url: '/ajax/myPods',
            success: function(response){
                response.map(function(podcast){
                    $('#podcasts-list-left-side').append(renderList(podcast))
                });
            }
        });

        function renderList(podcast){
            return '<li>' +
                    '<a href="/podcasts/' + podcast.slug + '" style="padding: 5px 5px 5px 8px !important;">' +
                        '<img src="' + podcast.thumbnail_100 + '" class="img-circle" width="40" height="40">' +
                        '<span class="font-bold" style="padding-left: 8px;"><small>'
                            + sliceText(podcast.name) +
                        '</small></span>' +
                    '</a>' +
                '</li>';
        }
        
        function sliceText(podcastName) {
            if (podcastName.length < 18) {
                return podcastName
            }
            return (podcastName.substring(0, 16 ) + '..')
        }
    </script>
@else
    
    
    <script>
        var text = '<div style="padding: 15px 10px 0 20px !important;"><small>';
        text += '<a href="/login">Login</a> or <a href="/register">Register</a>';
        text += '<br>to see your podcasts list<small></div>';
        $('#podcasts-list-left-side').append(text)
    </script>
@endif

