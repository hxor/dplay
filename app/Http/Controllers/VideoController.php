<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'video' => 'required',
            'status' => 'required'
        ]);

        Video::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Created Successfully',
        ]);
        
        return redirect()->route('admin.video.index');
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

    /**
     * Display DataTable
     * @return [type] [description]
     */
    public function dataTable()
    {
        $video = Video::query();
        return Datatables::of($video)
            ->addColumn('status', function ($video) {
                return $video->status == 1 ? 'Ya' : 'Tidak';
            })
            ->addColumn('action', function ($video) {
                return view('layouts.partials._action', [
                    'model' => $video,
                    'edit_url' => route('admin.video.edit', $video->id),
                    'show_url' => route('admin.video.show', $video->id),
                    'form_url' => route('admin.video.destroy', $video->id),
                ]);
            })
            ->make(true);
    }
}
