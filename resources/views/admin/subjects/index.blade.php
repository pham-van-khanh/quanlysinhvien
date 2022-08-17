@extends('admin.admin-master')
@section('content-title', 'List Subjects')
@section('title', 'List Subjects')
@section('danh-muc', 'List Subjects')
@section('content')
    <div>
    </div>

 @include('admin.admin-alert')

<br>

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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            <a href="{{route('subjects.create')}}" class="btn btn-info btn-sm"> Add Subjects </a></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($subjects as $index => $item)
                   <tr>
                       <td>
                           {{$index+1}}
                       </td>
                       <td>
                           {{ $item->name}}
                       </td>

                       <td class="align-middle">
                           <a href="{{ route('subjects.edit', $item->id) }}">
                               <button class="btn btn-danger" style="font-size:9px"href="javascript:;"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Edit user">
                                   Sửa
                               </button>
                           </a>

                       </td>
                   </tr>
               @endforeach
                {{-- {!! \App\Helpers\Helpers::faculty($faculties) !!} --}}
                </tbody>
            </table>
        </div>
        <div>{{ $subjects->links() }}</div>
    @endsection
