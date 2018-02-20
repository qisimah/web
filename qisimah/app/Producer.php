<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Producer extends Model
{
    //
    protected $primaryKey   = 'q_id';
    public $incrementing    = false;
    protected $fillable     = ['q_id', 'nick_name', 'first_name', 'last_name'];

    public static function store(Request $request)
    {
        $producer = [];
        $producer['q_id']   =   md5(uniqid(''));
        $producer['nick_name']  =   $request->input('nick_name');
        Producer::create($producer);
        return redirect('/producer');
    }
}
