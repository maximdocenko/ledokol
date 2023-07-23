@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Settings</h2>
        </div>
        <div class="pull-right">

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

<form enctype="multipart/form-data" action="{{ route('settings.update', $data->id) }}" method="POST">
    @csrf
    @method("PUT")

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">Phone</label>
                <input value="{{ $data->phone }}" type="text" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input value="{{ $data->email }}" type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" class="form-control">{!! $data->address !!}</textarea>
            </div>

            @include("admin.fields.edit.seo", ['data' => $data])

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
