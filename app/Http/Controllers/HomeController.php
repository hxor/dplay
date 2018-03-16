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
        $info = Info::where('status', 1)->limit(2)->get();
        $setting = Setting::first();
        $video = Video::select('video')->where('status', 1)->get();
        $data = [];
        foreach ($video as $video) {
            $data[] = asset($video->video);
        }
        $text = Text::where('status', 1)->get();

        // return $data;

        return view('welcome', compact('info', 'setting', 'data', 'text'));
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
