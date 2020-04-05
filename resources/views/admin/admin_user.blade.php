@extends('website/layout')
@section('title')
Adminpanel | Editing {{$sortuser->name}}
@endsection
@section('content')
<div class="col-md-10 m-auto " style="padding-top:109px;">
    <style>
        .form-control {width: 66% !important;}.textbox {height: 50px;}
    </style>
    <h3 class="title">
        Wijzig {{$sortuser->name}}'s profiel gegevens </h3>
    <p>
        <form class="kleinertext" action="/admin/update/user" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="form-group">
                <label for="text" class="bold">Naam</label>
                <input type="text" value="{{$sortuser->name}}" name="name" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Profiel achtergrond:</label>
                <input type="text" value="{{$sortuser->background}}" name="background" class="form-control" id="text">
                <label for="text"><b>Ondersteunt:</b> Links, HEX(#FF5733)</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Profiel foto:</label>
                <input type="file"  name="profile_image" class="form-control" id="text"
                    onchange="loadFile(event)">
                <label for="text"><b>Ondersteunt:</b> jpeg,png,jpg,gif,svg max 2MB</label>
            </div>
             <div class="fotots">
                <label for="text" class="bold">Huidige foto:</label>

                @if($sortuser->profile_image == 'default.png')
                <img class="col-sm-6" id="preview" src="{{ asset('Website/default.png') }}">

                @else
                <img class="col-sm-6" id="preview"
                    src="{{ asset($pathuser.'/'.$sortuser->id.'/'. $sortuser->profile_image) }}">

                @endif
            </div>
             <div class="fotots">

                <label for="text" class="bold">Preview foto:</label>

                <img class="col-sm-6 preview" id="output">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Opleiding:</label>
                <input type="text" value="{{$sortuser->opleiding}}" name="opleiding" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Github</label>
                <input type="text" value="{{$sortuser->github}}" name="github" class="form-control" id="text">
                <label for="text"><b>Note:</b> #empty = leeg</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Gitlab</label>
                <input type="text" value="{{$sortuser->gitlab}}" name="gitlab" class="form-control" id="text">
                <label for="text"><b>Note:</b> #empty = leeg</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">LinkedIn</label>
                <input type="text" value="{{$sortuser->github}}" name="linkedin" class="form-control" id="text">
                <label for="text"><b>Note:</b> #empty = leeg</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Over je zelf</label>
                <input type="text" value="{{$sortuser->about}}" name="about" class="form-control textbox" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Website</label>
                <input type="text" value="{{$sortuser->website}}" name="website" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Contact email</label>
                <input type="text" value="{{$sortuser->contactemail}}" name="contactemail" class="form-control"
                    id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">gebruikers id</label>
                <input type="text" name="id" class="form-control" value="{{$sortuser->id}}">
            </div>
            <button type="submit" class="btn btn-success">Verstuur</button>
        </form>
    </p>
</div>
@endsection
