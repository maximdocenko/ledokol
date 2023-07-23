<?php

namespace App\Repositories;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);
        $item->slug = $data->slug ? Str::slug($data->slug) : Str::slug($data->name);
        $item->svg = $data->svg;

        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->seo_title = json_encode($data->seo_title);
        $item->seo_description = json_encode($data->seo_description);

        $item->save();

    }

    public function create($data)
    {
        $item = new Category();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Category::find($id);

        $this->data($item, $data);
    }
}
