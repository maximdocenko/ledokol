<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Http\Requests\MainRequest;
use App\Repositories\ReviewRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        return view('admin.reviews.index', [
            'data' => Review::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(MainRequest $request, ReviewRepository $repository)
    {
        $repository->create($request);

        return redirect()->route('reviews.index')->with('success','Item created successfully.');
    }

    public function show(Review $data)
    {

    }

    public function edit($id)
    {
        return view('admin.reviews.edit', [
            'data' => Review::find($id)
        ]);
    }

    public function update(MainRequest $request, ReviewRepository $repository, $id)
    {
        $repository->update($request, $id);

        return redirect()->route('reviews.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Review::find($id);

        $item->delete();

        return redirect()->route('reviews.index')->with('success','Item deleted successfully');
    }
}
