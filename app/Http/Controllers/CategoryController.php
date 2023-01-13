<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\MainRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {    
        return view('categories.index', [
            'data' => Category::latest()->paginate(5),
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(MainRequest $request, CategoryRepository $repository)
    {

        $repository->create($request);
     
        return redirect()->route('categories.index')->with('success','Item created successfully.');
    }

    public function show(Category $data)
    {

    }

    public function edit($id)
    {
        return view('categories.edit', [
            'data' => Category::find($id)
        ]);
    }

    public function update(MainRequest $request, CategoryRepository $repository, $id)
    {
        $repository->update($request, $id);
    
        return redirect()->route('categories.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::find($id);

        $item->delete();

        return redirect()->route('categories.index')->with('success','Item deleted successfully');
    }
}
