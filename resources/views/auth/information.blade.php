@extends('admin.admin-master')
@section('title', $students[0]->name)
<aside class="profile-card">
    <header>
        <script type="text/JavaScript"
                src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
        </script>
        <script>
            $(function () {
                $('#avatar').on('click', function () {
                    $('#fileinput').trigger('click');
                });
            });
        </script>
        <form method="post" enctype="multipart/form-data" action="{{route('uploadImage', $students[0]->id)}}">
            @csrf
            @if($students[0]->avatar)
                <a>
                    <img name="avatar" style="cursor: pointer" id="avatar" src="{{asset($students[0]->avatar)}}"/>
                    <input id="fileinput" onchange="loadFile(event)" onClick="toggleButton()" type="file" name="avatar"
                           style="display:none; cursor: pointer"/>
                </a>
            @else
                @csrf
                <a>
                    <img name="avatar" style="cursor: pointer" id="avatar" src="{{asset('dist/img/camera.png')}}"/>
                    <input id="fileinput" onchange="loadFile(event)" onClick="toggleButton()" type="file" name="avatar"
                           style="display:none; cursor: pointer"/>
                </a>
            @endif
            <h4 style="color:red">{{$students[0]->name}}</h4>
            <h6>{{$students[0]->email}}</h6>
            <button type="submit" class="hidden gradient-button gradient-button-1" id="button"><i
                    class='fa fa-upload'></i></button>
            <script>
                function toggleButton() {
                    setTimeout(function () {
                        document.querySelector("#button").classList.toggle('hidden');
                    }, 2000);
                }
                var loadFile = function (event) {
                    var output = document.querySelector('#avatar');
                    console.log(output);
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function () {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>
            <style>
                .gradient-button {
                    margin: 10px;
                    font-family: "Arial Black", Gadget, sans-serif;
                    font-size: 20px;
                    padding: 15px;
                    text-align: center;
                    text-transform: uppercase;
                    transition: 0.5s;
                    background-size: 200% auto;
                    color: #FFF;
                    box-shadow: 0 0 20px #eee;
                    border-radius: 10px;
                    width: 200px;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                    transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
                    cursor: pointer;
                    display: inline-block;
                    border-radius: 25px;
                }

                .gradient-button:hover {
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
                    margin: 8px 10px 12px;
                }

                .gradient-button-1 {
                    background-image: linear-gradient(to right, #DD5E89 0%, #F7BB97 51%, #DD5E89 100%)
                }

                .gradient-button-1:hover {
                    background-position: right center;
                }

                button {
                    border: 0.5px solid;
                    border-radius: 10px;
                }

                .hidden {
                    display: none;
                }

                .w-100 {
                    width: 50%;
                }

                .mb-10 {
                    margin-bottom: 10px;
                }
            </style>
        </form>
    </header>
    <div class="profile-bio">
        <p></p>
    </div>
    <ul class="profile-social-links">
        <li class="text-center col-6">
            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile">
                <svg stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.0207 5.82839L15.8491 2.99996L20.7988 7.94971L17.9704 10.7781M13.0207 5.82839L3.41405 15.435C3.22652 15.6225 3.12116 15.8769 3.12116 16.1421V20.6776H7.65669C7.92191 20.6776 8.17626 20.5723 8.3638 20.3847L17.9704 10.7781M13.0207 5.82839L17.9704 10.7781"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </li>

        <li class="text-center col-6">
            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M10.796 2.244C12.653 1.826 14 3.422 14 5v14c0 1.578-1.347 3.174-3.204 2.756C6.334 20.752 3 16.766 3 12s3.334-8.752 7.796-9.756zm5.497 6.049a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a1 1 0 0 1-1.414-1.414L17.586 13H9a1 1 0 1 1 0-2h8.586l-1.293-1.293a1 1 0 0 1 0-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </li>
    </ul>
</aside>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

    html {
        height: 100%;
    }
    body {
        background-color: #bcdee7;
        position: fixed;
        padding: 0px;
        margin: 0px;
        width: 100%;
        height: 100%;
        font: normal 14px/1.618em "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    h1, h2 {
        font-weight: 400;
        margin: 0px 0px 5px 0px;
    }
    h1 {
        font-size: 24px;
    }
    h2 {
        font-size: 16px;
    }
    p {
        margin: 0px;
    }
    .profile-card {
        background: #FFB300;
        width: 1100px;
        height: 56px;
        position: absolute;
        left: 57%;
        top: 50%;
        z-index: 2;
        overflow: hidden;
        opacity: 0;
        margin-top: 70px;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
        box-shadow: 0px 3px 6px rgba(0 ,0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
        -webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_landscape 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
        animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_landscape 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
    }
    .profile-card header {
        width: 179px;
        height: 280px;
        padding: 40px 20px 30px 20px;
        display: inline-block;
        float: left;
        border-right: 2px dashed #EEEEEE;
        background: #FFFFFF;
        color: #000000;
        margin-top: 50px;
        opacity: 0;
        text-align: center;
        -webkit-animation: moveIn 1s 3.1s ease forwards;
        animation: moveIn 1s 3.1s ease forwards;
    }

    .profile-card header h1 {
        color: #FF5722;
    }

    .profile-card header a {
        display: inline-block;
        text-align: center;
        position: relative;
        margin: 25px 30px;
    }

    .profile-card header a:after {
        position: absolute;
        content: "";
        bottom: 3px;
        right: 3px;
        width: 20px;
        height: 20px;
        border: 4px solid #FFFFFF;
        -webkit-transform: scale(0);
        transform: scale(0);
        background: -webkit-linear-gradient(top, #ff0000 0%, #ff0000 50%, #ffff00 50%, #ffff00 100%);
        background: linear-gradient(#ff0000 0%, #ff0000 50%, #ffff00 50%, #ffff00 100%);
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-animation: scaleIn 0.3s 3.5s ease forwards;
        animation: scaleIn 0.3s 3.5s ease forwards;
    }

    .profile-card header a > img {
        width: 220px;
        height: 180px;
        background-color: #1d89e6;
        object-fit: none;
        object-position: center;
        max-width: 100%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: -webkit-box-shadow 0.3s ease;
        transition: box-shadow 0.3s ease;
        -webkit-box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
        box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
    }
    .profile-card header a:hover > img {
        -webkit-box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
    }
    .profile-card .profile-bio {
        width: 175px;
        height: 180px;
        display: inline-block;
        float: right;
        padding: 50px 20px 30px 20px;
        background: #FFFFFF;
        color: #333333;
        margin-top: 50px;
        text-align: center;
        opacity: 0;
        -webkit-animation: moveIn 1s 3.1s ease forwards;
        animation: moveIn 1s 3.1s ease forwards;
    }
    .profile-social-links {
        width: 165px;
        display: inline-block;
        float: right;
        margin: 34px;
        padding: 15px 20px;
        background: #FFFFFF;
        margin-top: 50px;
        text-align: center;
        opacity: 0;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-animation: moveIn 1s 3.1s ease forwards;
        animation: moveIn 1s 3.1s ease forwards;
    }
    .profile-social-links li {
        list-style: none;
        margin: -5px 0px 0px 0px;
        padding: 0px;
        float: left;
        width: 33.3%;
        text-align: center;
    }
    .profile-social-links li a {
        display: inline-block;
        width: 39px;
        height: 38px;
        padding: 5px;
        position: relative;
        overflow: hidden!important;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    .profile-social-links li a img {
        position: relative;
        z-index: 1;
    }
    .profile-social-links li a:before {
        display: block;
        content: "";
        background: rgba(0, 0, 0, 0.3);
        position: absolute;
        left: 0px;
        top: 0px;
        width: 36px;
        height: 36px;
        opacity: 1;
        -webkit-transition: transform 0.4s ease, opacity 1s ease-out;
        transition: transform 0.4s ease, opacity 1s ease-out;
        -webkit-transform: scale3d(0, 0, 1);
        transform: scale3d(0, 0, 1);
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    .profile-social-links li a:hover:before {
        -webkit-animation: ripple 1s ease forwards;
        animation: ripple 1s ease forwards;
    }
    .profile-social-links li a img,
    .profile-social-links li a svg {
        width: 24px;
    }
    @media screen and (min-aspect-ratio: 4/3) {
        body {
            background-size: 100% auto;
        }
        body:before {
            width: 0px;
        }
        @-webkit-keyframes puff {
            0% {
                top: 100%;
                width: 0px;
                padding-bottom: 0px;
            }
            100% {
                top: 50%;
                width: 100%;
                padding-bottom: 100%;
            }
        }
        @keyframes puff {
            0% {
                top: 100%;
                width: 0px;
                padding-bottom: 0px;
            }
            100% {
                top: 50%;
                width: 100%;
                padding-bottom: 100%;
            }
        }
    }
    @media screen and (min-height: 480px) {
        .profile-card {
            -webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_portrait 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
            animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_portrait 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
        }
        .profile-card header {
            width: auto;
            height: auto;
            padding: 30px 20px;
            display: block;
            float: none;
            border-right: none;
        }
        .profile-card .profile-bio {
            width: auto;
            height: auto;
            padding: 15px 20px 30px 20px;
            display: block;
            float: none;
        }
        .profile-social-links {
            width: 100%;
            display: block;
            float: none;
        }
    }
    @media screen and (min-aspect-ratio: 4/3) {
        body {
            background-size: 100% auto;
        }
        body:before {
            width: 0px;
            -webkit-animation: puff_landscape 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
            animation: puff_landscape 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
        }
    }
    @-webkit-keyframes init {
        0% {
            width: 0px;
            height: 0px;
        }
        100% {
            width: 56px;
            height: 56px;
            margin-top: 0px;
            opacity: 1;
        }
    }
    @keyframes init {
        0% {
            width: 0px;
            height: 0px;
        }
        100% {
            width: 56px;
            height: 56px;
            margin-top: 0px;
            opacity: 1;
        }
    }
    @-webkit-keyframes puff_portrait {
        0% {
            top: 100%;
            height: 0px;
            padding: 0px;
        }
        100% {
            top: 50%;
            height: 100%;
            padding: 0px 100%;
        }
    }
    @keyframes puff_portrait {
        0% {
            top: 100%;
            height: 0px;
            padding: 0px;
        }
        100% {
            top: 50%;
            height: 100%;
            padding: 0px 100%;
        }
    }
    @-webkit-keyframes puff_landscape {
        0% {
            top: 100%;
            width: 0px;
            padding-bottom: 0px;
        }
        100% {
            top: 50%;
            width: 100%;
            padding-bottom: 100%;
        }
    }
    @keyframes puff_landscape {
        0% {
            top: 100%;
            width: 0px;
            padding-bottom: 0px;
        }
        100% {
            top: 50%;
            width: 100%;
            padding-bottom: 100%;
        }
    }
    @-webkit-keyframes borderRadius {
        0% {
            -webkit-border-radius: 50%;
        }
        100% {
            -webkit-border-radius: 0px;
        }
    }
    @keyframes borderRadius {
        0% {
            -webkit-border-radius: 50%;
        }
        100% {
            border-radius: 0px;
        }
    }
    @-webkit-keyframes moveDown {
        0% {
            top: 50%;
        }
        50% {
            top: 40%;
        }
        100% {
            top: 100%;
        }
    }
    @keyframes moveDown {
        0% {
            top: 50%;
        }
        50% {
            top: 40%;
        }
        100% {
            top: 100%;
        }
    }
    @-webkit-keyframes moveUp {
        0% {
            background: #FFB300;
            top: 100%;
        }
        50% {
            top: 40%;
        }
        100% {
            top: 50%;
            background: #E0E0E0;
        }
    }
    @keyframes moveUp {
        0% {
            background: #FFB300;
            top: 100%;
        }
        50% {
            top: 40%;
        }
        100% {
            top: 50%;
            background: #E0E0E0;
        }
    }
    @-webkit-keyframes materia_landscape {
        0% {
            background: #E0E0E0;
        }
        50% {
            -webkit-border-radius: 4px;
        }
        100% {
            width: 440px;
            height: 280px;
            background: #FFFFFF;
            -webkit-border-radius: 4px;
        }
    }
    @keyframes materia_landscape {
        0% {
            background: #E0E0E0;
        }
        50% {
            border-radius: 4px;
        }
        100% {
            width: 440px;
            height: 280px;
            background: #FFFFFF;
            border-radius: 4px;
        }
    }
    @-webkit-keyframes materia_portrait {
        0% {
            background: #E0E0E0;
        }
        50% {
            -webkit-border-radius: 4px;
        }
        100% {
            width: 280px;
            height: 454px;
            background: #FFFFFF;
            -webkit-border-radius: 4px;
        }
    }
    @keyframes materia_portrait {
        0% {
            background: #E0E0E0;
        }
        50% {
            border-radius: 4px;
        }
        100% {
            width: 280px;
            height: 454px;
            background: #FFFFFF;
            border-radius: 4px;
        }
    }
    @-webkit-keyframes moveIn {
        0% {
            margin-top: 50px;
            opacity: 0;
        }
        100% {
            opacity: 1;
            margin-top: -20px;
        }
    }
    @keyframes moveIn {
        0% {
            margin-top: 50px;
            opacity: 0;
        }
        100% {
            opacity: 1;
            margin-top: -20px;
        }
    }
    @-webkit-keyframes scaleIn {
        0% {
            -webkit-transform: scale(0);
        }
        100% {
            -webkit-transform: scale(1);
        }
    }
    @keyframes scaleIn {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @-webkit-keyframes ripple {
        0% {
            transform: scale3d(0, 0, 0);
        }
        50%, 100% {
            -webkit-transform: scale3d(1, 1, 1);
        }
        100% {
            opacity: 0;
        }
    }
    @keyframes ripple {
        0% {
            transform: scale3d(0, 0, 0);
        }
        50%, 100% {
            transform: scale3d(1, 1, 1);
        }
        100% {
            opacity: 0;
        }
    }
</style>
