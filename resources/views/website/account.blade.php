@extends('website/layout')
@section('title')
Account | Wall of fame
@endsection
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
        Wijzig je Account  gegevens </h3>
    <p>
        <form class="kleinertext" action="updateUsersRed" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="text" class="bold">Naam</label>
                <input type="text" value="{{$users->name}}" name="name" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Profiel achtergrond:</label>
                <input type="text" value="{{$users->background}}" name="background" class="form-control" id="text">
                <label for="text"><b>Ondersteunt:</b> Links, HEX(#FF5733)</label>
            </div>
            <div class="form-group">
                <label for="text"class="bold">Profiel foto:</label>
                <input type="file" value="{{$users->profile_image}}" name="profile_image" class="form-control"
                    id="text">
                <label for="text"><b>Ondersteunt:</b> jpeg,png,jpg,gif,svg max 2MB</label>
            </div>
            <label for="text"class="bold">Huidige foto:</label>

            @if($users->profile_image == 'default.png')
            <img class="col-sm-6" id="preview" src="{{ asset('Website/default.png') }}">

            @else
            <img class="col-sm-6" id="preview" src="{{ asset($pathuser.'/'.$users->id.'/'. $users->profile_image) }}">

            @endif

            <div class="form-group">
                <label for="text" class="bold">Opleiding:</label>
                <input type="text" value="{{$users->opleiding}}" name="opleiding" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">Github</label>
                @if($users->github == "#empty")
                <input type="text" value="" name="github" class="form-control" id="text">
                @else
                <input type="text" value="{{$users->github}}" name="github" class="form-control" id="text">
                @endif
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Gitlab</label>
                @if($users->gitlab == "#empty")
                <input type="text" value="" name="gitlab" class="form-control" id="text">
                @else
                <input type="text" value="{{$users->gitlab}}" name="gitlab" class="form-control" id="text">
                @endif
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">LinkedIn</label>
                @if($users->linkedin == "#empty")
                <input type="text" value="" name="linkedin" class="form-control" id="text">
                @else
                <input type="text" value="{{$users->linkedin}}" name="linkedin" class="form-control" id="text">
                @endif
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
            </div>
            <div class="form-group">
                <label for="text" class="bold">Over me zelf</label>
                <input type="text" value="{{$users->about}}" name="about" class="form-control textbox" id="text">
            </div>
            <div class="form-group">
                <label for="text" class="bold">persoonlijke website</label>
                @if($users->website == "#empty")
                <input type="text" value="" name="website" class="form-control" id="text">
                @else
                <input type="text" value="{{$users->website}}" name="website" class="form-control" id="text">
                @endif
                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>
                <div class="form-group">
                    <label for="text" class="bold">Contact email</label>
                    <input type="text" value="{{$users->contactemail}}" name="contactemail" class="form-control"
                        id="text">
                </div>
                <button type="submit" name="updateUsersRed" class="btn btn-primary">Wijzig gegevens</button>
        </form>
    </p>
</div>
@endsection
