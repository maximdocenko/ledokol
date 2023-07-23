<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit(Request $request) {
        $data = Setting::find(1);
        return view("admin.settings.edit", ['data' => $data]);
    }

    public function update(Request $request) {
        $data = Setting::find(1);
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->seo_title = json_encode($request->seo_title);
        $data->seo_description = json_encode($request->seo_description);
        $data->save();
        return back();
    }
}
