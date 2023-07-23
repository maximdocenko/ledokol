<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($resource) {
        return view("admin.".$resource.'.index', [
            'data' => App\Models\ucfirst(rtrim($resource))::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create() {

    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
