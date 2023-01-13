<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Requests\MainRequest;
use App\Repositories\SectionRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {    
        return view('sections.index', [
            'data' => Section::latest()->paginate(5),
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(MainRequest $request, SectionRepository $repository)
    {

        $repository->create($request);
     
        return redirect()->route('sections.index')->with('success','Item created successfully.');
    }

    public function show(Section $data)
    {

    }

    public function edit($id)
    {
        return view('sections.edit', [
            'data' => Section::find($id)
        ]);
    }

    public function update(MainRequest $request, SectionRepository $repository, $id)
    {
        $repository->update($request, $id);
    
        return redirect()->route('sections.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Section::find($id);

        $item->delete();

        return redirect()->route('sections.index')->with('success','Item deleted successfully');
    }
}
