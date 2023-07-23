@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Employee</h2>
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

<form enctype="multipart/form-data" action="{{ route('employees.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">{{ __("messages.name") }}</label>
                <input placeholder="{{ __("messages.name") }} (ru)" type="text" name="name[ru]" class="form-control">
                <input placeholder="{{ __("messages.name") }} (uz)" type="text" name="name[uz]" class="form-control">
                <input placeholder="{{ __("messages.name") }} (en)" type="text" name="name[en]" class="form-control">
            </div>

            @include("admin.fields.create.file")

            <div class="form-group">
                <label for="">{{ __("messages.job") }}</label>
                <input placeholder="{{ __("messages.job") }} (ru)" type="text" name="job[ru]" class="form-control">
                <input placeholder="{{ __("messages.job") }} (uz)" type="text" name="job[uz]" class="form-control">
                <input placeholder="{{ __("messages.job") }} (en)" type="text" name="job[en]" class="form-control">
            </div>

            <div class="form-group">
                <select name="top" id="">
                    <option value="">Выбрать</option>
                    <option value="1">Топ менеджмент</option>
                    <option value="0">Комманда</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
