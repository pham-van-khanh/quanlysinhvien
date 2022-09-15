@extends('admin.admin-master')
@section('content-title', 'List Student Registed')
@section('title', 'List Student Registed')
@section('content')
    <link href='https://css.gg/export.css' rel='stylesheet'>
    <div class="col-2 flex-md-grow-1 border border-dashed">
        <center>
            <b class="text-success"> {{$subjects->name}}</b>
        </center>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Stt</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Point
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects->students as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{$index+1}}
                        </td>
                        <td class="text-center">
                            {{ $item->name}}
                        </td>
                        <td class="text-center">
                            {{ $item->pivot->mark}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            <div class="row">
                <div class="col mr-2">
                    <a data-bs-toggle="tooltip" data-bs-placement="right" title="Export Excel"
                       class="btn-outline-dark"
                       href="{{route('export', $subjects->id )}}">
                        <i style="font-size: 30px" class="fas fa-file-download"></i>
                    </a>
                </div>
                <div id="coss" class="col mr-2">
                    <form enctype="multipart/form-data" action="{{route('import', $subjects->id)}}" method="POST">
                        @csrf
                        <div class="file-upload">
                            <div class="file-upload-select">
                                <div class="file-select-button">Upload File Excel</div>
                                <div class="file-select-name">No file chosen...</div>
                                <input type="file" name="import_file" style="display:show;"
                                       onClick="toggleButton()" id="file-upload-input">
                            </div>
                            <button type="submit" class="hidden gradient-button gradient-button-1" id="button">
                                <i class='fa fa-upload'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script>
        let fileInput = document.getElementById("file-upload-input");
        let fileSelect = document.getElementsByClassName("file-upload-select")[0];
        fileSelect.onclick = function () {
            fileInput.click();
        }
        fileInput.onchange = function () {
            let filename = fileInput.files[0].name;
            let selectName = document.getElementsByClassName("file-select-name")[0];
            selectName.innerText = filename;
        }

    </script>
    <style>
        .file-upload .file-upload-select {
            display: block;
            color: #dbdbdb;
            cursor: pointer;
            text-align: left;
            background: #1a242f;
            overflow: hidden;
            position: relative;
            border-radius: 6px;
            width: 300px;
            height: 40px;
        }

        .file-upload .file-upload-select .file-select-button {
            background: #161f27;
            padding: 10px;
            display: inline-block;
        }

        .file-upload .file-upload-select .file-select-name {
            display: inline-block;
            padding: 10px;
        }

        .file-upload .file-upload-select:hover .file-select-button {
            background: #324759;
            color: #ffffff;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }

        .file-upload .file-upload-select input[type="file"] {
            display: none;
        }

    </style>
    <script type="text/JavaScript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
    </script>
    <script>
        $(function () {
            $('#avatar').on('click', function () {
                $('#file').trigger('click');
            });
        });
    </script>
    <script>
        function toggleButton() {
            setTimeout(function () {
                document.querySelector("#button").classList.toggle('hidden');
            }, 2000);
        }
    </script>
    <style>

        #coss {
            margin-left: -1000px;
        }

        .gradient-button {
            border: 1px solid #ffffff;
            margin: 5px;
            font-family: "Arial Black", Gadget, sans-serif;
            font-size: 15px;
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: #FFF;
            box-shadow: 0 0 20px #eee;
            border-radius: 5px;
            width: 37px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            cursor: pointer;
            display: inline-block;
            border-radius: 55px;
        }

        .gradient-button-1 {
            background-image: linear-gradient(to right, #050538 0%, #0a2237 51%, #050538 0%)
        }

        .gradient-button-1:hover {
            background-position: right center;
        }

        .width {
            width: 50px;
        }

        .hidden {
            display: none;
        }

    </style>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection
