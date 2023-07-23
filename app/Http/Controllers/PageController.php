<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\Employee;
use App\Models\Page;
use App\Http\Requests\MainRequest;
use App\Repositories\PageRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        return view('admin.pages.index', [
            'data' => Page::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(MainRequest $request, PageRepository $repository)
    {
        $repository->create($request);

        return redirect()->route('pages.index')->with('success','Item created successfully.');
    }

    public function show(Page $data)
    {

    }

    public function edit($id)
    {
        return view('admin.pages.edit', [
            'data' => Page::find($id)
        ]);
    }

    public function update(MainRequest $request, PageRepository $repository, $id)
    {
        $repository->update($request, $id);

        return redirect()->route('pages.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Page::find($id);

        $item->delete();

        return redirect()->route('pages.index')->with('success','Item deleted successfully');
    }
}
