<?php
namespace App\Http\Controllers;

use App\Http\Middleware\AjaxAuth;
use App\Http\Middleware\VerifyUserLogged;
use App\Podty\UserEpisodes;
use Illuminate\Support\Facades\Auth;

class UserEpisodesController extends Controller
{
    private $userEpisode;

    public function __construct(UserEpisodes $userEpisode)
    {
        $this->middleware(VerifyUserLogged::class)->only('listening');
        $this->middleware(AjaxAuth::class)->except('listening');
        $this->userEpisode = $userEpisode;
    }

    public function touch($episodeId, $currentTime)
    {
        $this->userEpisode->touch(Auth::user()->name, $episodeId, $currentTime);
    }

    public function detach($episodeId)
    {
        $this->userEpisode->detach(Auth::user()->name, $episodeId);
    }

    public function detachAll($podcastId)
    {
        $this->userEpisode->detachAll(Auth::user()->name, $podcastId);
    }

    public function listening()
    {
        $episodes = $this->userEpisode->listening(Auth::user()->name);
    
        return view('listening')->with([
            'episodes' => $episodes
        ]);
    }
}
