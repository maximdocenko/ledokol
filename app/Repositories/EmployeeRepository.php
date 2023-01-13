<?php

namespace App\Repositories;
use App\Models\Employee;
use Illuminate\Support\Str;

class EmployeeRepository
{

    public function data($item, $data) {

        $item->name = $data->name;
        $item->slug = $data->slug ? Str::slug($data->slug) : Str::slug($data->name);
        
        if($data->file('image')) {
            $image = Str::random(10).".".$data->file('image')->getClientOriginalExtension();
            $item->image = $image;
            $data->image->move(public_path('images'), $image);
        }

        $item->save();

    }
   
    public function create($data)
    {
        $item = new Employee();

        $this->data($item, $data);

    }

    public function update($data, $id) {

        $item = Employee::find($id);

        $this->data($item, $data);
    }
}
