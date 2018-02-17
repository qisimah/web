<?php

namespace App;

use Firebase\FirebaseLib;

class QisimahBase
{
    private $firebase;

    function __construct()
    {
        $this->firebase = new FirebaseLib('https://qisimah-4403d.firebaseio.com', 'fO8pxgUUHOISm7jYEZBVxFTObfnrv4zB2x0W1OJH');
    }

    public static function saveData($reference, $id,  Array $data)
    {
        $q = new QisimahBase();
        $q->firebase->set('/'.$reference.'/'.$id, $data);
        echo "$id Synced to $reference @ ".date('Y-m-d H:i:s')."\n";
    }

    public static function pushData($ref, $data)
    {
        $q = new QisimahBase();
        $q->firebase->push('/'.$ref, $data);
        echo "Synced to $ref @ ".date('Y-m-d H:i:s')."\n";
    }

    public static function deleteData($reference)
    {
        $q = new QisimahBase();
        return $q->firebase->delete('/'.$reference);

    }
}
