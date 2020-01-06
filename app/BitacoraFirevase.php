<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class BitacoraFirevase extends Model
{
    public static function createTicket($request)
    {
        //$newPost = $database
        //    ->getReference('blog/posts')
        //    ->push([
        //        'title' => 'Post title',
        //        'body' => 'This should probably be longer.'
        //    ]);
        //
        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //Mail::to(Auth::user()->email)->send(new WellcomeMail);

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
    }
}
