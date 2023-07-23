@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Review</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('reviews.index') }}"> Back</a>
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

    <form enctype="multipart/form-data" action="{{ route('reviews.update', $data->id) }}" method="POST">
        @csrf
        @method("PUT")

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                @include("admin.fields.edit.name", ['data' => $data])

                @include("admin.fields.edit.description", ['data' => $data])

                @include("admin.fields.edit.file", ['data' => $data])

                <div class="form-group">
                    <label for="">{{ __("messages.avatar") }}</label>
                    <input name="avatar" type="file" class="form-control">
                    @if($data->avatar)
                        <img class="icon" src="{{ url('images', $data->avatar) }}" alt="">
                    @endif
                </div>

                <div class="form-group">
                    <label for="">{{ __("messages.author") }}</label>
                    <input value="{{ $data->author }}" placeholder="{{ __("messages.author") }}" type="text" name="author" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
