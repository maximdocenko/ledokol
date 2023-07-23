<?php

namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Str;

class PostRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);
        $item->slug = $data->slug ? Str::slug($data->slug) : Str::slug($data->name);
        $item->section = $data->section ?? 0;

        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->category_id = $data->category_id;
        $item->description = json_encode($data->description);

        $item->seo_title = json_encode($data->seo_title);
        $item->seo_description = json_encode($data->seo_description);

        $item->employee = $data->employee ?? 0;
        $item->main = $data->main ?? 0;

        $item->save();

    }

    public function create($data)
    {
        $item = new Post();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Post::find($id);

        $this->data($item, $data);
    }
}
