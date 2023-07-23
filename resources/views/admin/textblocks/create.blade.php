@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New TextBlock</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('textblocks.index') }}"> Back</a>
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

<form enctype="multipart/form-data" action="{{ route('textblocks.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            @include("admin.fields.create.name")

            @include("admin.fields.create.description")

            @include("admin.fields.create.file")

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
