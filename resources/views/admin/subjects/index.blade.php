@extends('admin.admin-master')
@section('title', 'List Subjects')
@section('content-title', 'List Subjects')
@section('content')
    <div class="col-2 flex-md-grow-1">
        @can('create')
            <a href="{{ route('subjects.create') }}"
               class="btn btn-info btn-sm"> Add Subject </a>
        @endcan
    </div>
    <div class="card-body px-0 pb-0">
        <div class="table-responsive p-0">
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Stt</th>
                    <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-7">Name
                    </th>
                    @if(Auth::user()->roles[0]->name == 'admin')
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                            Detail
                        </th>
                    @else
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                            Point
                        </th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                            registration
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $index => $subject)
                    <tr>
                        <td class="text-center">{{$index + 1}}</td>
                        <td>
                            <b>
                                {{$subject->name}}
                            </b>
                        </td>
                        <td  class="text-center">
                            @can('edit')
                                <a style="color: #febc06" href="{{ route('subjects.edit', $subject->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('delete')
                                <a style="color: red" href="{{ route('subjects.destroy', $subject->id) }}" class="btnDelete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endcan
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-link"><span class="bi bi-eye"></span></button>
                        </td>
                        <div>
                            @if(Auth::user()->roles[0]->name == 'student')
                                @if(isset($getMark))
                                    <td></td>
                                    <td class=" text-center"><input type="checkbox"></td>
                                @else
                                    @for($i = 0; $i < $studentSubject->count(); $i++)
                                        @if($subject->id == $studentSubject[$i]->id)
                                            @if($studentSubject[$i]->pivot->mark == null)
                                                <td class="text-bg-info text-white text-center"> Has Not Updated</td>
                                                <td class="text-center lock-size"><input disabled type="checkbox"
                                                                                         checked></td>
                                            @else
                                                <td class="text-center">{{$studentSubject[$i]->pivot->mark}}/10</td>
                                                <td class="text-center"><input disabled type="checkbox" checked></td>
                                            @endif
                                            @break
                                        @elseif($i == $studentSubject->count() - 1)
                                            @if($subject->id != $studentSubject[$i]->id)
                                                <td></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                            @endif
                                        @endif
                                    @endfor
                                @endif
                            @endif
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form action="" method="POST" id="form-delete">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}
            </form>
        </div>
        <div>
            {{$subjects->links()}}
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <style>
            a {
                font-size: 20px;
            }
        </style>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection
