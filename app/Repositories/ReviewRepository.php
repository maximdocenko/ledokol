<?php

namespace App\Repositories;
use App\Models\Review;
use Illuminate\Support\Str;

class ReviewRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);
        $item->author = $data->author;

        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        if($data->file('avatar')) {
            $image = Str::random(10).".".$data->file('avatar')->getClientOriginalExtension();
            $item->avatar = $image;
            $data->avatar->move(public_path('images'), $image);
        }

        $item->description = json_encode($data->description);

        $item->save();

    }

    public function create($data)
    {
        $item = new Review();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Review::find($id);

        $this->data($item, $data);
    }
}
