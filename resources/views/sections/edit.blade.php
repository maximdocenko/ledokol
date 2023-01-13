@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Section</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sections.index') }}"> Back</a>
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
   
<form enctype="multipart/form-data" action="{{ route('sections.update', $data->id) }}" method="POST">
    @csrf
    @method("PUT")

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">name</label>
                <input value="{{$data->name}}" type="text" name="name" class="form-control">
                
                <input value="{{$data->slug}}" type="text" name="slug" class="form-control form-control-small">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">description</label>
                <textarea name="description" class="form-control">{!! $data->description !!}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">file</label>
                <input name="image" type="file" class="form-control">
                @if($data->image)
                    <img class="icon" src="{{ url('images', $data->image) }}" alt="">
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">seo_title</label>
                <input value="{{$data->seo_title}}" type="text" name="seo_title" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">description</label>
                <textarea name="seo_description" class="form-control">
                    {!! $data->seo_description !!}
                </textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection