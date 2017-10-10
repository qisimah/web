<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;
use Psy\Exception\RuntimeException;
use Thujohn\Twitter\Facades\Twitter;

class Tweet extends Model
{
    //
    public static function PostPlay($artist, $title, $broadcaster)
    {
        $title = str_replace("'", '', $title);
        $tweet = [
            "$artist - #$title is being played on $broadcaster #QisimahAudioInsights #RealTimeAirPlayNotification ".explode('.', microtime(true))[1],
            "$broadcaster is playing #$title by $artist. Follow us for real time updates on songs played on radio ".explode('.', microtime(true))[1]
        ];

        return Twitter::postTweet(['status' => $tweet[(int) substr(str_shuffle('01'), 0, 1)]]);
    }

    public static function uploadData($url)
    {
        try {
            return Twitter::uploadMedia(['media_data' => File::getData($url)]);
        } catch (RuntimeException $runtimeException) {
            return $runtimeException->getCode();
        }
    }
}
