<?php

namespace App\Repositories;
use App\Models\Page;
use Illuminate\Support\Str;

class PageRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);
        $item->slug = $data->slug ? Str::slug($data->slug) : Str::slug($data->name);

        $item->seo_title = json_encode($data->seo_title);
        $item->seo_description = json_encode($data->seo_description);

        $item->save();

    }

    public function create($data)
    {
        $item = new Page();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Page::find($id);

        $this->data($item, $data);
    }
}
