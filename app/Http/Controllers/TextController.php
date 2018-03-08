<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.text.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.text.create');
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
            'text' => 'required|min:15',
            'status' => 'required'
        ]);

        Text::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Created Successfully',
        ]);
        
        return redirect()->route('admin.text.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $text = Text::findOrFail($id);
        return view('pages.text.show', compact('text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $text = Text::findOrFail($id);
        return view('pages.text.edit', compact('text'));
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
            'text' => 'required|min:15',
            'status' => 'required'
        ]);

        $text = Text::findOrFail($id);
        $text->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Updated Successfully',
        ]);
        
        return redirect()->route('admin.text.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Text::destroy($id)) return redirect()->back();
        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Deleted Successfully',
        ]);
        return redirect()->route('admin.text.index');
    }

    /**
     * Display DataTable
     * @return [type] [description]
     */
    public function dataTable()
    {
        $text = Text::query();
        return Datatables::of($text)
            ->addColumn('status', function ($text) {
                return $text->status == 1 ? 'Ya' : 'Tidak';
            })
            ->addColumn('action', function ($text) {
                return view('layouts.partials._action', [
                    'model' => $text,
                    'edit_url' => route('admin.text.edit', $text->id),
                    'show_url' => route('admin.text.show', $text->id),
                    'form_url' => route('admin.text.destroy', $text->id),
                ]);
            })
            ->make(true);
    }
}
