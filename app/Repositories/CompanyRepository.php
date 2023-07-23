<?php

namespace App\Repositories;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyRepository
{

    public function data($item, $data) {

        $item->name = json_encode($data->name);

        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->save();

    }

    public function create($data)
    {
        $item = new Company();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Company::find($id);

        $this->data($item, $data);
    }
}
