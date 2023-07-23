<?php

namespace App\Repositories;
use App\Models\Section;
use Illuminate\Support\Str;

class SectionRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);
        $item->slug = $data->slug ? Str::slug($data->slug) : Str::slug($data->name);

        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->description = json_encode($data->description);
        $item->content = json_encode($data->content);

        $item->seo_title = json_encode($data->seo_title);
        $item->seo_description = json_encode($data->seo_description);

        $item->save();

    }

    public function create($data)
    {
        $item = new Section();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Section::find($id);

        $this->data($item, $data);
    }
}
