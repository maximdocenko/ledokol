<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\Employee;
use App\Models\Post;
use App\Http\Requests\MainRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index', [
            'data' => Post::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'sections' => Section::all(),
            'categories' => Category::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function store(MainRequest $request, PostRepository $repository)
    {

        if ($request->hasFile('image')) {
            $classifiedImg = $request->file('image');
            $filename = Str::random(10);
            // Intervention
            $image = \Intervention\Image\Facades\Image::make($classifiedImg)->encode('webp', 90)->resize(800, 800)->save(public_path('uploads/test/'  .  $filename . '.webp'));
        }

        exit();


        $repository->create($request);

        return redirect()->route('posts.index')->with('success','Item created successfully.');
    }

    public function show(Post $data)
    {

    }

    public function edit($id)
    {
        return view('admin.posts.edit', [
            'sections' => Section::all(),
            'categories' => Category::all(),
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
