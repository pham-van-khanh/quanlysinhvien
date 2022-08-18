@extends('admin.admin-master')
@section('content-title', 'List Faculty')
@section('title', 'List Faculty')
@section('danh-muc', 'List Faculty')
@section('content')
    <div>
        <br>
        @include('admin.admin-alert')
    </div>
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


                 {!! \App\Helpers\Helpers::faculty($faculties) !!}
            </table>
        </div>
        <div>{{ $faculties->links() }}</div>
        <div class="modal fade modal-bookmark" id="edit-bookmark" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                    <label>Name Faculty</label>


                                    <input class="form-control" id="nameFaculty" name="name" type="text" required="" autocomplete="off" value="">
                                </div>
                            </div>
                            <input type="hidden" name="faculty_id" id="faculty_id">
                            <button class="btn btn-secondary" type="button" id="saveUpdateForm" onclick="saveUpdate()">Save</button>
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{asset('dist/js/js.js')}}"
@endsection

