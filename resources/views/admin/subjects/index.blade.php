@extends('admin.admin-master')
@section('title', 'List Subjects')
@section('content-title', 'List Subjects')
@section('content')
    <br>
    </form>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stt</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            <a href="{{ route('subjects.create') }}" class="btn btn-info btn-sm"> Add Subjects </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $index => $item)
                        <tr>
                            <td>
                                {{ $index + 1 }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>

                            <td class="align-middle">
                                <a href="{{ route('subjects.show', $item->id) }}">
                                    {{ Form::submit('Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                </a>
                                {{ Form::open(['method' => 'delete', 'route' => ['subjects.destroy', $item->id]]) }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    {{ Form::submit('Del', ['class' => 'btn btn-danger btn-sm']) }}
                                </div>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
