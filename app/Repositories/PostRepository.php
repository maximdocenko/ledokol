<?php

namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Str;

class PostRepository
{

    public function data($item, $data) {

        $item->name = $data->name;
        $item->slug = $data->slug ? Str::slug($data->slug) : Str::slug($data->name);
        
        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->description = $data->description;
        $item->seo_title = $data->seo_title;
        $item->seo_description = $data->seo_description;
        $item->employee = $data->employee;
        $item->main = $data->main;

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
