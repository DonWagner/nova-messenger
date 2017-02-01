<?php

/*
|--------------------------------------------------------------------------
| Module Events
|--------------------------------------------------------------------------
|
| Here is where you can register all of the Events for the module.
*/

Event::listen('backend.menu', function($user)
{
    $user = Auth::user();

    // Prepare the Label.
    $data = array(
        //'count' => $user->newPostsCount()
        'count' => 1
    );

    $label = View::make('Partials/UnreadCount', $data, 'Messenger')->render();

    // Prepare the Items.
    $items = array(
        array(
            'uri'    => 'admin/posts',
            'title'  => __d('messenger', 'Posts'),
            'label'  => $label,
            'icon'   => 'wechat',
            'weight' => 2,
        ),
    );

    return $items;
});
