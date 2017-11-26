<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    private $name;
    private $release_date;

    protected $primaryKey = 'q_id';
    public $incrementing = false;

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
