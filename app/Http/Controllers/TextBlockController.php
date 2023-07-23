<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\Employee;
use App\Models\TextBlock;
use App\Http\Requests\MainRequest;
use App\Repositories\TextBlockRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TextBlockController extends Controller
{

    public function index()
    {
        return view('admin.textblocks.index', [
            'data' => TextBlock::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create()
    {
        return view('admin.textblocks.create', [
            'sections' => Section::all(),
            'categories' => Category::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function store(MainRequest $request, TextBlockRepository $repository)
    {
        $repository->create($request);

        return redirect()->route('textblocks.index')->with('success','Item created successfully.');
    }

    public function show(TextBlock $data)
    {

    }

    public function edit($id)
    {
        return view('admin.textblocks.edit', [
            'data' => TextBlock::find($id)
        ]);
    }

    public function update(MainRequest $request, TextBlockRepository $repository, $id)
    {
        $repository->update($request, $id);

        return redirect()->route('textblocks.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TextBlock::find($id);

        $item->delete();

        return redirect()->route('textblocks.index')->with('success','Item deleted successfully');
    }
}
