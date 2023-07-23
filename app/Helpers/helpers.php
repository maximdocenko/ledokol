<?php

function current_url($url) {
    return str_contains(request()->url(), $url) ? 'current-page' : null;
}


function setting($field, $lang = false) {
    if($lang) {
        return json_decode(\App\Models\Setting::find(1)->$field)->$lang;
    }
    return \App\Models\Setting::find(1)->$field;
}

function textblock($id) {
    $data =  \App\Models\TextBlock::find($id);
    return [
        'name' => json_decode($data->name)->ru,
        'description' => json_decode($data->description)->ru,
        'image' => $data->image,
    ];
}

function lang() {
    if(session()->get("lang")) {
        return session()->get("lang");
    }
    return 'ru';
}
