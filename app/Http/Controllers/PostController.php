<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Employee;
use App\Models\Post;
use App\Http\Requests\MainRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {    
        return view('posts.index', [
            'data' => Post::latest()->paginate(5),
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'sections' => Section::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function store(MainRequest $request, PostRepository $repository)
    {

        $repository->create($request);
     
        return redirect()->route('posts.index')->with('success','Item created successfully.');
    }

    public function show(Post $data)
    {

    }

    public function edit($id)
    {
        return view('posts.edit', [
            'sections' => Section::all(),
            'employees' => Employee::all(),
            'data' => Post::find($id)
        ]);
    }

    public function update(MainRequest $request, PostRepository $repository, $id)
    {
        $repository->update($request, $id);
    
        return redirect()->route('posts.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Post::find($id);

        $item->delete();

        return redirect()->route('posts.index')->with('success','Item deleted successfully');
    }
}
