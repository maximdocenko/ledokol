<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($resource) {
        return view($resource.'.index', [
            'data' => App\Models\ucfirst(rtrim($resource))::latest()->paginate(5),
            'i' => (request()->input('page', 1) - 1) * 5
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
