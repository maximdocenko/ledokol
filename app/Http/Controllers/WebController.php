<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use App\Models\Review;
use App\Models\Section;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function admin() {
        return view("admin.index");
    }

    public function index() {
        return view("content.index");
    }

    public function lang($lang) {
        session()->put("lang", $lang);
        return back();
    }

    public function about() {
        $data = Page::where("slug", "about")->first();
        return view("content.about", [
            'data' => $data
        ]);
    }

    public function blog() {
        $posts = Post::where("id", ">", 0)->orderBy("id", "DESC")->paginate(10);
        return view("content.category", [
            //'category' => $category,
            'posts' => $posts,
        ]);
    }

    public function slug($slug) {
        $category = Category::where("slug", $slug)->orderBy("id", "DESC")->first();
        $posts = Post::where("category_id", $category->id)->get();
        return view("content.category", [
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    public function item($id) {
        $data = Post::find($id);
        return view("content.post", ['data' => $data]);
    }

    public function service($slug) {
        $item = Section::where("slug", $slug)->first();
        return view("content.service", [
            'item' => $item
        ]);
    }

    public function clients() {
        $data = Page::where("slug", "clients")->first();
        $reviews = Review::all();
        return view("content.clients", [
            'reviews' => $reviews,
            'data' => $data,
        ]);
    }

    public function telegram(Request $request) {
        $apiToken = "6110007788:AAEnqtFnqAUXc3OkVlu9oHcT0KKXXHt1rp8";
        $data = [
            'chat_id' => 112667613,
            'text' => $request->your_name . "\n" . $request->your_email . "\n" . $request->phone_number . "\n" . $request->your_task,
            'parse_mode' => 'html'
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
            http_build_query($data) );

        return back();
    }

    public function xml() {
        $posts = Post::all();
        $pages = Page::all();
        $sections = Section::all();
        return response()->view('content.xml', [
            'posts' => $posts,
            'sections' => $sections,
            'pages' => $pages,
        ])->header('Content-Type', 'text/xml');
    }
}
