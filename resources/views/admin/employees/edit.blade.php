@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
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

<form enctype="multipart/form-data" action="{{ route('employees.update', $data->id) }}" method="POST">
    @csrf
    @method("PUT")

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">{{ __("messages.name") }}</label>
                @foreach(json_decode($data->name) as $key => $value)
                    <input value="{{$value}}" type="text" name="name[{{$key}}]" class="form-control">
                @endforeach
            </div>


            @include("admin.fields.edit.file", ['data' => $data])

            <div class="form-group">
                <label for="">{{ __("messages.job") }}</label>
                @foreach(json_decode($data->job) as $key => $value)
                    <input value="{{$value}}" type="text" name="job[{{$key}}]" class="form-control">
                @endforeach
            </div>


            <div class="form-group">
                <select name="top" id="">
                    <option value="">Выбрать</option>
                    <option {{ $data->top == 1 ? 'selected' : null }} value="1">Топ менеджмент</option>
                    <option {{ $data->top == 0 ? 'selected' : null }} value="0">Комманда</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
