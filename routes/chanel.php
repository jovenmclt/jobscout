<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat', function ($user) {
    return auth()->check(); // or check if the user is allowed in this channel
});
