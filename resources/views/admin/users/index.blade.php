@extends('admin.admin-master')
@section('content-title', 'List User')
@section('title', 'List User')
@section('content')

    <div class="col-2">
        <a href="{{ route('users.create') }}" class="btn btn-info btn-sm"> Add Users </a>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stt</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time Create</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $index => $item)
                    <tr>
                        <td>
                            {{ $index + 1 }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
{{--                            @if(!empty($item->getRoleNames()))--}}
{{--                                @foreach($item->getRoleNames() as $v)--}}
{{--                                    <label class="text-sm-center">{{ $v }}</label>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('users.show', $item->id) }}">Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $item->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <style>
            .width {
                width: 100px;
            }
        </style>
        <div>
            {{ $data->links() }}
        </div>
        <div class="modal fade modal-bookmark" id="edit-bookmark" tabindex="-1" style="display: none;"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Cập nhật</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation" novalidate="">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Name Student</label>
                                    <input class="form-control" id="nameStudent" name="name" type="text"
                                           required="" autocomplete="off" value="">
                                    <label>Phone Student</label>
                                    <input class="form-control" id="phoneStudent" name="phone" type="text"
                                           required="" autocomplete="off" value="">
                                    <label>Address Student</label>
                                    <input class="form-control" id="addressStudent" name="address" type="text"
                                           required="" autocomplete="off" value="">
                                    <label>Gender Student</label>
                                    <input class="form-control" id="genderStudent" name="gender" value type="text"
                                           required="" autocomplete="off" value="1">
                                    <label>Email Student</label>
                                    <input class="form-control" id="emailStudent" name="email" type="text"
                                           required="" autocomplete="off" value="">

                                </div>
                            </div>
                            <input type="hidden" name="student_id" id="student_id">
                            <br>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" id="saveUpdate"
                                    onclick="saveUpdate()">Save
                            </button>
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{ asset('dist/js/js.js') }}"
@endsection
