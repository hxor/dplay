<?php

namespace App\Http\Controllers;

use App\Info;
use App\Setting;
use App\Video;
use App\Text;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'admin']);
    }

    public function index()
    {
        $graha1 = Info::where('title', 'Graha 1')->where('status', 1)->first();
        $graha2 = Info::where('title', 'Graha 2')->where('status', 1)->first();
        $setting = Setting::first();
        $video = Video::select('video')->where('status', 1)->get();
        $data = [];
        foreach ($video as $video) {
            $data[] = asset($video->video);
        }
        $text = Text::where('status', 1)->get();

        // return $data;

        return view('welcome', compact('graha1', 'graha2', 'setting', 'data', 'text'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('home');
    }
}
