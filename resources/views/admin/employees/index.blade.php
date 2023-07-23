@extends('layouts.app')

@section('content')
    <h2>Employees</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="my-table">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a class="btn btn-success" href="{{ route('employees.create') }}">
                    <i class="fa fa-plus"></i>
                </a>
            </td>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>
                @if($item->image)
                    <img class="icon" src="{{ url('images', $item->image) }}" alt="">
                @endif
            </td>
            <td>{{ json_decode($item->name)->{lang()} }}</td>
            <td class="inline-children">
                <a class="btn btn-primary" href="{{ route('employees.edit',$item->id) }}">
                    <i class="fa fa-pencil"></i>
                </a>
                <form onsubmit="return confirm('Вы уверены что хотите удалить?');" action="{{ route('employees.destroy',$item->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-remove"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $data->links() !!}

@endsection
