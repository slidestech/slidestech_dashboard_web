<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('notifications', function ($user) {
    // Access the user's socket ID when they connect
    $socketId = request()->socketId;
    // Here, you can store the socket ID or perform any other necessary actions
    info('Socket ID:====================== ' . $socketId);

    return true; // Return true to allow the user to listen on the 'notifications' channel
});