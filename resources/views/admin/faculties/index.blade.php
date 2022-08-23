@extends('admin.admin-master')
@section('content-title', 'List Faculty')
@section('title', 'List Faculty')
@section('danh-muc', 'List Faculty')
@section('content')

    <form action="">
        <div style="width:250px" class="input-group input-group-outline">
            <label class="form-label">Search here...</label>
            <input type="text" name="search" class="form-control">
        </div>

    </form>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Stt</th>
                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Time Create</th>
                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">
                            <a href="{{ route('faculties.create') }}" class="btn btn-info btn-sm"> Add Faculty </a>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($faculties as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{$index+1}}
                        </td>
                        <td class="text-center">
                            {{ $item->name}}
                        </td>
                        <td class="text-center">
                            {{ $item->created_at}}
                        </td>

                        <td class="text-center">
                            <a href="{{ route('faculties.edit', $item->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            {{ Form::open(array('method' => 'delete', 'route' => ['faculties.destroy', $item->id])) }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                {{ Form::submit('Del', array('class'=>'btn btn-danger btn-sm')) }}
                            </div>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            {{$faculties->links()}}
        </div>
@endsection

