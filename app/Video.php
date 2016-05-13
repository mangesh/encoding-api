<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

    public function __construct()
    {
        //$this->video = $video;
    }

    public function data()
    {
    	return $this->toArray();
    }
}
