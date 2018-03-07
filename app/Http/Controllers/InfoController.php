<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.info.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.info.create');
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
            'body' => 'required|min:15',
            'status' => 'required'
        ]);

        $request['user_id'] = Auth::user()->id;

        Info::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Created Successfully',
        ]);
        
        return redirect()->route('admin.info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::findOrFail($id);
        return view('pages.info.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::findOrFail($id);
        return view('pages.info.edit', compact('info'));
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
        $this->validate($request, [
            'title' => 'required|min:5',
            'body' => 'required|min:15',
            'status' => 'required'
        ]);

        $request['user_id'] = Auth::user()->id;

        $info = Info::findOrFail($id);
        $info->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Updated Successfully',
        ]);
        
        return redirect()->route('admin.info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Info::destroy($id)) return redirect()->back();
        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Deleted Successfully',
        ]);
        return redirect()->route('admin.info.index');
    }

    /**
     * Display DataTable
     * @return [type] [description]
     */
    public function dataTable()
    {
        $info = Info::query();
        return Datatables::of($info)
            ->addColumn('user', function ($info) {
                return $info->user->name;
            })
            ->addColumn('status', function ($info) {
                return $info->status == 1 ? 'Ya' : 'Tidak';
            })
            ->addColumn('action', function ($info) {
                return view('layouts.partials._action', [
                    'model' => $info,
                    'edit_url' => route('admin.info.edit', $info->id),
                    'show_url' => route('admin.info.show', $info->id),
                    'form_url' => route('admin.info.destroy', $info->id),
                ]);
            })
            ->make(true);
    }
}
