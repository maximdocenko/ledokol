<?php

namespace App\Repositories;
use App\Models\TextBlock;
use Illuminate\Support\Str;

class TextBlockRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);

        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->description = json_encode($data->description);

        $item->save();

    }

    public function create($data)
    {
        $item = new TextBlock();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = TextBlock::find($id);

        $this->data($item, $data);
    }
}
