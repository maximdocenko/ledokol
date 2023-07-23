@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
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

<form enctype="multipart/form-data" action="{{ route('categories.update', $data->id) }}" method="POST">
    @csrf
    @method("PUT")

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            @include("admin.fields.edit.name", ['data' => $data])

            @include("admin.fields.edit.file", ['data' => $data])

            <div class="form-group">
                <label for="">{{ __("messages.svg") }}</label>
                <textarea name="svg" class="form-control">{!! $data->svg !!}</textarea>
            </div>

            @include("admin.fields.edit.seo", ['data' => $data])

            <button type="submit" class="btn btn-primary">{{ __("messages.submit") }}</button>
        </div>
    </div>

</form>
@endsection
