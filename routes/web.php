<?php

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('profile/{user?}', 'ProfileController@index');
Route::get('feed/{searchInput}', 'PodcastController@findByName');

Route::get('episodes/{episodeId}', 'PodcastController@episode');
Route::get('episode/{podcastId}/{term}', 'PodcastController@findOnEpisodes');

Route::get('ajax/sidebar', 'UsersController@get');
Route::get('ajax/followPodcast/{feedId}', 'UserPodcastsController@follow');
Route::get('ajax/unfollowPodcast/{feedId}', 'UserPodcastsController@unfollow');
Route::get('ajax/followUser/{username}', 'ProfileController@follow');
Route::get('ajax/unfollowUser/{username}', 'ProfileController@unfollow');
Route::get('ajax/allFriends', 'FriendsController@all');
Route::get('ajax/findUser/{user}', 'FriendsController@find');
Route::get('ajax/touchUser', 'UsersController@touch');
Route::get('ajax/uptEpisode/{episodeId}/{currentTime}', 'UserEpisodesController@touch');

Route::get('ajax/detachEpisode/{episodeId}', 'UserEpisodesController@detach');

Route::get('ajax/favoriteEpisode/{episodeId}', 'UserFavoritesController@create');
Route::get('ajax/unfavoriteEpisode/{episodeId}', 'UserFavoritesController@delete');

/* Podcast Router */
Route::get('ajax/moreEpisodes/{podcastId}/{page?}', 'PodcastController@getEpisodesPerPage');
Route::get('discover', 'HomeController@discover');
Route::get('ajax/discover', 'PodcastController@top');

Route::get('podcasts', 'PodcastController@home');
Route::get('podcasts/{podcastId}', 'PodcastController@podcast');

Route::get('categories', 'CategoriesController@home');
Route::get('categories/{category}', 'CategoriesController@one');

Route::get('favorites', 'UserFavoritesController@all');
Route::get('listening', 'UserEpisodesController@listening');


Route::get('ajax/myPods', 'UserPodcastsController@all');
