<?php
namespace App\Http\Controllers;

use App\Format;
use App\Podty\ApiClient;
use App\Podty\UserPodcasts;
use App\Podty\Users;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use Format;

    private $apiClient;

    private $userPodcasts;

    private $users;

    public function __construct(ApiClient $apiClient, UserPodcasts $userPodcasts, Users $users)
    {
        $this->apiClient = $apiClient;
        $this->userPodcasts = $userPodcasts;
        $this->users = $users;
    }

    public function index($user = null)
    {
        $user = $this->getUser($user);

        if (!$user) {
            return redirect('/');
        }

        return view('profile')->with('data', [
            'user' => $user,
            'podcasts' => $this->getUserPodcasts($user['username']),
            'isFriend' => !Auth::user() ? false : $this->getAreFriends($user)->count()
        ]);
    }

    private function getUser($user = null)
    {
        if (!$user && !Auth::user()) return false;

        return $this->users->get($user ?? Auth::user()->name)['data'];
    }

    public function getAreFriends($user)
    {
        $response = $this->users->friends(Auth::user()->name);

        return $response->filter(function($friend) use ($user) {
            return $friend['username'] == $user['username'];
        });
    }

    public function getUserPodcasts($username)
    {
        $response = $this->userPodcasts->all($username);

        return $response->map(function($feed){
            return $this->formatHomePodcasts($feed);
        });
    }

    public function follow($username)
    {
        if (Auth::user() && $this->users->follow(Auth::user()->name, $username)){
            return response('', 200);
        }

        return response('', 400);
    }

    public function unfollow($username)
    {
        if (Auth::user() && $this->users->unfollow(Auth::user()->name, $username)){
            return response('', 200);
        }

        return response('', 400);
    }
}
