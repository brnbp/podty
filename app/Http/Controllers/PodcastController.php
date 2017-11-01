<?php
namespace App\Http\Controllers;

use App\Events\AnalyticsPageView;
use App\Format;
use App\Http\Middleware\VerifyUserLogged;
use App\Podty\Podcasts;
use App\Podty\UserEpisodes;
use App\Podty\UserPodcasts;
use Illuminate\Support\Facades\Auth;

class PodcastController extends Controller
{
    use Format;

    private $podcastsApi;

    private $userPodcasts;

    public function __construct()
    {
        $this->middleware(VerifyUserLogged::class)->only('home');
        $this->podcastsApi = new Podcasts;
        $this->userPodcasts = new UserPodcasts;
    }

    public function home()
    {
        $response = $this->userPodcasts->all(Auth::user()->name);

        $podcasts = $response->map(function($feed){
            return $this->formatHomePodcasts($feed);
        });

        return view('podcasts')->with(compact('podcasts'));
    }

    /**
     * Get Top Rated Podcasts
     */
    public function top()
    {
        $podcasts = $this->podcastsApi->top();

        return $this->formatPodcasts($podcasts);
    }

    /**
     * @param $podcastId
     * @return mixed
     */
    public function podcast($podcastId)
    {
        $podcastId = explode('-', $podcastId)[0];

        if (!is_numeric($podcastId)) {
            return redirect('/404');
        }

        $podcast = $this->podcastsApi->episodes($podcastId);

        $podcast = reset($podcast);

        if (!$podcast) {
            return redirect('/404');
        }

        $listeners = $this->podcastsApi->listeners($podcastId);
        
        $listeners = $listeners->map(function($listener){
           return $this->formatUser($listener);
        });

        $userFollows = $this->getUserFollowPodcast($podcastId);
        
        event(new AnalyticsPageView('/podcasts.' . $podcastId, 'BE - Podcast - ' . $podcast['name']));
        
        return view('podcast')->with('data', [
            'podcast'     => $podcast,
            'episodes'    => $podcast['episodes'],
            'userFollows' => $userFollows,
            'listeners'   => $listeners
        ]);
    }

    /**
     * @param $podcastId
     * @param int $page
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function getEpisodesPerPage($podcastId, $page = 1, $limit = 28)
    {
        $podcastId = explode('-', $podcastId)[0];

        if (!is_numeric($podcastId)) {
            return redirect('/404');
        }

        $offset = ($limit * $page);

        $podcast = $this->podcastsApi->episodes($podcastId, $offset);

        if (!$podcast->count()) {
            return response()->json([], 404);
        }

        $episodes = $podcast['episodes'];
        unset($podcast['episodes']);

        return response()->json( [
            'podcast'  => $podcast,
            'episodes' => $episodes,
        ]);
    }

    public function discover()
    {
        return view('top');
    }

    private function getUserFollowPodcast($podcastId)
    {
        if (!Auth::user()) {
            return false;
        }

        return $this->userPodcasts->follows(Auth::user()->name, $podcastId);
    }

    public function findByName($searchInput)
    {
        $response = $this->podcastsApi->findByName($searchInput);

        if (!$response) {
            return [];
        }

        return $response;
    }

    public function findOnEpisodes($podcastId, $searchInput)
    {
        $response = $this->podcastsApi->findOnEpisodes($podcastId, $searchInput);

        if (!$response) {
            return [];
        }

        return $response;
    }

    public function episode($episodeId)
    {
        $episode = $this->podcastsApi->episode($episodeId);

        if (Auth::user()) {
            $userEpisode = (new UserEpisodes)->one(Auth::user()->name, $episodeId);
            if ($userEpisode->count()){
                $episode['episodes'] = $userEpisode;
            }
        }

        if (!$episode->count()) {
            return redirect('/404');
        }

	    return view('episode')->with('podcast', $episode);
    }
}
