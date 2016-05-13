<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jobs\EncodeVideo;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->dispatch(new EncodeVideo());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            echo "Video is received \n";

            $videoTempName = $request->file('video_file')->getPathname();
            $current_time = \Carbon\Carbon::now()->toDateTimeString();
            $videoName = $request->file('video_file')->getClientOriginalName();
            $video_extension = $request->file('video_file')->getClientOriginalExtension();
            $path = base_path() . '/public/uploads/videos/';
            $request->file('video_file')->move($path , $current_time.'_'.$videoName);

            $video = new Video;

            $video->user_id = 1;
            $video->video_path = $path.$current_time.'_'.$videoName;

            $video->save();

            $added_video = Video::findOrFail($video->id);
            echo $added_video->id;
            $this->dispatch(new EncodeVideo($added_video));
        } else {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
