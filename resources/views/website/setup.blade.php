@extends('website/layout')
@section('title')
Setup | Wall of fame
@endsection
@section('content')
<div class="col-md-10 m-auto " style="padding-top:109px;">
    <style>
        .form-control { width: 66% !important;}.textbox {height: 50px;}
    </style>
    <h3 class="title">
        Like regels </h3>
    <p>
        Je kan <b>2</b> keer iemand liken<br>
        <ul>
            <li> <b>1</b> keer iemand van een andere klas</li>
            <li> <b>1</b> keer iemand van je eigen klas</li>
            <li> Je kan <b><u>niet</u></b> jezelf een like geven!</li>
        </ul>
    </p>
    <h3 class="title">
        Eerste Setup </h3>
    <p>
        <form class="kleinertext" action="updateUsersRed" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="text" class="bold">Naam</label>
                <input type="text" value="{{$users->name}}" name="name" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Profiel achtergrond:</label>
                <input type="text" value="" name="background" class="form-control" id="text" required>
                <label for="text"><b>Ondersteunt:</b> Links, HEX(#FF5733)</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Profiel foto:</label>
                <input type="file" value="{{$users->profile_image}}" name="profile_image" class="form-control" id="text"
                 onchange="loadFile(event)"    required>
                <label for="text"><b>Ondersteunt:</b> jpeg,png,jpg,gif,svg max 2MB</label>
            </div>
              <div class="fotots">

                <label for="text" class="bold">Live profile foto:</label>

                <img class="col-sm-6 preview" id="output">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Opleiding:</label>
                <input type="text" value="{{$users->opleiding}}" name="opleiding" class="form-control" id="text" required>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Github Link:</label>
                @if ($users->github == "#empty")
                <input type="text" value="" name="github" class="form-control" id="text">

                @else
                <input type="text" value="{{$users->github}}" name="github" class="form-control" id="text">

                @endif
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Gitlab Link:</label>
                 @if ($users->gitlab == "#empty")
                <input type="text" value="" name="gitlab" class="form-control" id="text">

                @else
                <input type="text" value="{{$users->gitlab}}" name="gitlab" class="form-control" id="text">

                @endif
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">LinkedIn Link:</label>
             @if ($users->linkedin == "#empty")
                <input type="text" value="" name="linkedin" class="form-control" id="text">

                @else
                <input type="text" value="{{$users->linkedin}}" name="linkedin" class="form-control" id="text">

                @endif               
             <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">About</label>
                <input type="text" value="{{$users->about}}" name="about" class="form-control textbox" id="text" required>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Website</label>
                <input type="text" value="" name="website" class="form-control" id="text">
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
                <label for="text"><b>Voorbeeld:</b>www.test.nl en niet https://www.test.nl</label>

            </div>
            <div class="form-group">
                <label for="text" class="bold">Contact email</label>
                <input type="email" value="{{$users->email}}" name="contactemail" class="form-control" id="text" required>
            </div>
            <button type="submit" name="updateUsersRed" class="btn button_setup btn-primary">Submit</button>
        </form>
    </p>
</div>
@endsection
