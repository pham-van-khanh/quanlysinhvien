@extends('admin.admin-master')
@section('title', 'Update Mark')
@section('content')
    <form>
        <input type="button" class=" btn btn-outline-success add-row" value="Add Row">
    </form>
    <div class="container">
        <div class="row">
            <div hidden class="col-md-4 mb-5" style="border:0px;">
                <div class="card h-100" style="border:0px;">
                    <div>
                        <h3>Basic:</h3>
                        <select id="selectbox">
                            <option value="pt_1">Option 1</option>
                            <option value="en_2">Option 2</option>
                            <option value="es_3" disabled>Option 3 (Disabled)</option>
                            <option value="ch_4">Option 4</option>
                            <option value="5">Option 5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div hidden class="col-md-4 mb-5" style="border:0px;">
                <div class="card h-100" style="border:0px;">
                    <div>
                        <h3>Searchbox:</h3>
                        <select id="selectbox2">
                            <option value="pt_1">Cristiano Ronaldo</option>
                            <option value="en_2">Lionel Messi</option>
                            <option value="es_3" disabled>Neymar Jr. (Disabled)</option>
                            <option value="ch_4">Ronaldinho</option>
                            <option value="5">Luis Figo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="row2" class="row">
            <div id="1" class="col-md-5 mb-5" style="border:0px;">
                <div>
                    <select id="selectbox6" class="form-control selectbox">
                        @foreach ($students as $student)
                            <option value="{{$student->name}}">{{$student->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="2" class="col-md-5 mb-5" style="border:0px;">
                <div>
                    <input type="text" placeholder="Mark" value="{{$mark}}" class="form-control">
                </div>
            </div>
            <div id="3" class="col-md-2 mb-5" style="border:0px;">
                <div>
                    <button class="btn btn-outline-danger"> Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/update.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".add-row").click(function () {
                var output = <?php echo json_encode($html); ?>;
                var inputMark = <?php echo json_encode($mark); ?>;
                var input = "<input value=''>"
                var markup =
                    "<div id='row2' class='row'>" +
                    "<div class='col-md-5 mb-5' style='border: 0px'>" + "<div>" + "<select id='selectbox6' class='form-control selectbox'>" + output + "</select>" + "</div>" + "</div>" +
                    "<div class='col-md-5 mb-5'>" + "<div>" + input + "</div>" + "</div>" +
                    "<div class='col-md-2 mb-5'>" + "<div>" + "<button class='btn btn-outline-danger remove'>" + 'DELETE' + "</button>" + "</div>" + "</div>" +
                    "</div>";
                $(".container").append(markup);
                // $(".selectbox").change(function () {
                //     var value = $(".selectbox option:selected").val();
                //     if (value == '') return;
                //     $(".selectbox option:selected").attr('disabled', '').siblings().removeAttr("disabled");;
                //     $(this).val();
                // });
                $('select').change(function () {
                    var optionSelected = $(this).find("option:selected");
                    console.log(optionSelected);
                    var valueSelected = optionSelected.val();
                    var textSelected = optionSelected.text();
                });
            });
        });
    </script>
    <style>
        #row2 {
            margin-bottom: -55px;
        }

        #selectbox6 {
            margin-top: 8px;
            height: 45px;
        }

        div button {
            margin-top: 8px;
            height: 45px;
        }

        div input {
            margin: 8px 2px 10px 2px;
            height: 45px;
        }
    </style>
@endsection
