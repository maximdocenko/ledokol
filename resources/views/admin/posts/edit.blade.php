@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form enctype="multipart/form-data" action="{{ route('posts.update', $data->id) }}" method="POST">
    @csrf
    @method("PUT")

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            @include("admin.fields.edit.name", ['data' => $data])

            <div class="form-group">
                <label for="">section</label>
                <select class="form-control" name="section" id="">
                    <option value="">Выберите</option>
                    @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">category</label>
                <select required class="form-control" name="category_id" id="">
                    <option value="">Выберите</option>
                    @foreach($categories as $category)
                        <option {{ $data->category_id == $category->id ? 'selected' : null }} value="{{$category->id}}">{{ json_decode($category->name)->{lang()} }}</option>
                    @endforeach
                </select>
            </div>

            @include("admin.fields.edit.description", ['data' => $data])

            @include("admin.fields.edit.file", ['data' => $data])

            @include("admin.fields.edit.seo", ['data' => $data])

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
