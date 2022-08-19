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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stt</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time Create</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            <a href="{{ route('faculties.create') }}" class="btn btn-info btn-sm"> Add Faculty </a>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($faculties as $index => $item)
                    <tr>
                        <td>
                            {{$index+1}}
                        </td>
                        <td>
                            {{ $item->name}}
                        </td>  <td>
                            {{ $item->created_at}}
                        </td>

                        <td class="align-middle">
                            <a href="{{ route('faculties.show', $item->id) }}">
                                {{Form::submit('Edit',array('class'=>'btn btn-warning btn-sm'))}}
                            </a>
                            {{Form::open(array('method' => 'delete', 'route' =>['faculties.destroy', $item->id]))}}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                {{Form::submit('Del',array('class'=>'btn btn-danger btn-sm'))}}
                            </div>
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{asset('dist/js/js.js')}}"
@endsection

