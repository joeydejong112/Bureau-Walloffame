@extends('website/layout')
@section('content')


<div class="col-md-10 m-auto " style="padding-top:109px;">
    <style>
        .form-control {
            width: 66% !important;
        }

        .textbox {
            height: 50px;
        }

    </style>
    <h3 class="title">
        Like regels </h3>

    <p>
        Je kan <b>2</b> keer iemand liken<br>
        <ul>
            <li> <b>1</b> keer iemand van een andere klas</li>
            <li> <b>1</b> keer iemand van je eigen klas</li>
            <li> Je kan niet je zelf liken!</li>
        </ul>
    </p>
    <h3 class="title">
        Eerste Setup </h3>

    <p>

        <form class="kleinertext" action="updateUsersRed" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="text">Naam</label>
                <input type="text" value="{{$users->name}}" name="name" class="form-control" id="text">
            </div>

            <div class="form-group">
                <label for="text">Profiel achtergrond:</label>
                <input type="text" value="" name="background" class="form-control" id="text" required>
                <label for="text"><b>Ondersteunt:</b> Links, HEX(#FF5733)</label>

            </div>
            <div class="form-group">

                <label for="text">Profiel foto:</label>
                <input type="file" value="{{$users->profile_image}}" name="profile_image" class="form-control" id="text"
                    required>
                <label for="text"><b>supported:</b> jpeg,png,jpg,gif,svg max 2MB</label>

            </div>
            <img class="col-sm-6" id="preview" src="">

            <div class="form-group">
                <label for="text">opleiding:</label>
                <input type="text" value="{{$users->opleiding}}" name="opleiding" class="form-control" id="text" required>
            </div>
            <div class="form-group">
                <label for="text">github Link:</label>
                <input type="text" value="{{$users->github}}" name="github" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text">gitlab Link:</label>
                <input type="text" value="{{$users->gitlab}}" name="gitlab" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text">LinkedIn Link:</label>
                <input type="text" value="{{$users->github}}" name="linkedin" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text">About</label>
                <input type="text" value="{{$users->about}}" name="about" class="form-control textbox" id="text" required>
            </div>
            <div class="form-group">
                <label for="text">Website</label>
                <input type="text" value="{{$users->website}}" name="website" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text">Contact email</label>
                <input type="email" value="{{$users->contactemail}}" name="contactemail" class="form-control" id="text" required>
            </div>
            <button type="submit" name="updateUsersRed" class="btn button_setup ">Submit</button>
        </form>
    </p>





</div>


@endsection
