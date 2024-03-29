<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!--<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>-->
    <style>
        .tox-notifications-container {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function (){
            /*new SimpleMDE({ element: document.getElementById("simplemde_description_ru") });
            new SimpleMDE({ element: document.getElementById("simplemde_description_uz") });
            new SimpleMDE({ element: document.getElementById("simplemde_description_en") });
            new SimpleMDE({ element: document.getElementById("simplemde_content_ru") });
            new SimpleMDE({ element: document.getElementById("simplemde_content_uz") });
            new SimpleMDE({ element: document.getElementById("simplemde_content_en") });*/
            tinymce.init({
                //selector: 'textarea#simplemde_description_uz', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'powerpaste advcode table lists checklist image code',
                toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | link image',
                selector: 'textarea',  // change this value according to your HTML
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
            });
        });
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    @if(!request()->is("login"))
                    <div class="col-sm-2">
                        <ul>
                            <li>
                                <a href="{{ url('admin/sections') }}">Sections</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/categories') }}">Categories</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/posts') }}">Posts</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/pages') }}">Pages</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/companies') }}">Companies</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/reviews') }}">Reviews</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/employees') }}">Employees</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/textblocks') }}">Text blocks</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/settings') }}">Settings</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="col-sm-10">
                        @yield('content')
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
