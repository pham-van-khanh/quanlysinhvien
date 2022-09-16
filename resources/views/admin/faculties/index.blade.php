@extends('admin.admin-master')
@section('content-title', 'List Faculty')
@section('title', 'List Faculty')
@section('content')
    <div class="col-2 flex-md-grow-1">
        @can('create')
            <a href="{{ route('faculties.create') }}"
               class="btn btn-info btn-sm"> Add Faculty </a>
        @endcan
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Stt</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Time
                        Create
                    </th>
                    <th></th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">
                        Register Faculty
                    </th>
                </tr>
                </thead>
                <tbody>
                <form action="{{route('registerFaculty', $students)}}">
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
                                @can('edit')
                                    <a style="color: #febc06" href="{{ route('faculties.edit', $item->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endcan
                                @can('delete')
                                    <a style="color: red"
                                       href="{{ route('faculties.destroy', ['faculty' => $item->id]) }}"
                                       class="btnDelete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endcan
                            </td>
                            <td class="text-center">
                                <input type="radio" value="{{$item->id}}">
                            </td>
                        </tr>
                    @endforeach
                    <button type="submit" class="btn btn-outline-success btn-sm">Register </button>
                </form>
            </table>
            <form action="" method="POST" id="form-delete">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}
            </form>
        </div>
        <div>
            {{$faculties->links()}}
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            $('.btnDelete').click(function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
                $('#form-delete').attr('action', href);
                if (confirm('Are you sure?')) {
                    $('#form-delete').submit();
                }
            });
        </script>
    </div>
@endsection
