<?php

namespace Sturt\Maximizer\LaravelSlackEvents\Http;

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => __NAMESPACE__], function() {
    Route::post(config('slackEvents.route'), 'EventController@fire');
});
