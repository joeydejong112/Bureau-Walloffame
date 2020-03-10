@extends('layout')
@section('content')



    
    
<div class="col-md-10 m-auto "style="padding-top:109px;">
    <style>
    .form-control{
        width: 66%!important;
    }
    .textbox{
        height: 50px;
    }
    </style>
                <h3 class="title">
                  Wijzig je profiel gegevens </h3>
    
                <p>
    
                    <form class="kleinertext" action="/admin/update/user" method="POST" enctype="multipart/form-data">
                    {{ @csrf_field() }}
                        <div class="form-group">
                            <label for="text">Naam</label>
                            <input type="text" value="{{$sortuser->name}}" name="name" class="form-control"
                                id="text">
                        </div>
    
                        <div class="form-group">
                            <label for="text">Profiel achtergrond:</label>
                            <input type="text" value="{{$sortuser->background}}" name="background" class="form-control"
                                id="text">
                                <label for="text"><b>Ondersteunt:</b> Links, HEX(#FF5733)</label>
    
                        </div>
                        <div class="form-group">
    
                            <label for="text">Profiel foto:</label>
                            <input type="file" value="{{$sortuser->profile_image}}" name="profile_image" class="form-control"
                                id="text">
                            <label for="text"><b>Ondersteund:</b> jpeg,png,jpg,gif,svg max 2MB</label>
    
                        </div>
                              <img class="col-sm-6" id="preview"  src=""> 
    
                         <div class="form-group">
                            <label for="text">Opleiding:</label>
                            <input type="text" value="{{$sortuser->opleiding}}" name="opleiding"
                                class="form-control" id="text">
                        </div>
                        <div class="form-group">
                            <label for="text">Github</label>
                            <input type="text" value="{{$sortuser->github}}" name="github" class="form-control"
                                id="text">
                        </div> <div class="form-group">
                            <label for="text">Gitlab</label>
                            <input type="text" value="{{$sortuser->gitlab}}" name="gitlab" class="form-control"
                                id="text">
                        </div> 
                        <div class="form-group">
                            <label for="text">LinkedIn</label>
                            <input type="text" value="{{$sortuser->github}}" name="linkedin" class="form-control"
                                id="text">
                        </div>
                        <div class="form-group">
                            <label for="text">Over je zelf</label>
                            <input type="text" value="{{$sortuser->about}}" name="about" class="form-control textbox"
                                id="text">
                        </div> 
                        <div class="form-group">
                            <label for="text">Website</label>
                            <input type="text" value="{{$sortuser->website}}" name="website" class="form-control"
                                id="text">
                        </div>
                        <div class="form-group">
                            <label for="text">Contact email</label>
                            <input type="text" value="{{$sortuser->contactemail}}" name="contactemail" class="form-control"
                                id="text">
                        </div> 
                        <div class="form-group">
                            <label for="text">gebruikers id</label>
                            <input type="text" name="id" class="form-control" value="{{$sortuser->id}}">

                        </div> 
                        <button type="submit" class="btn btn-success">Verstuur</button>
                    </form>
                </p>
    
    
    
    
    
    </div>
    
    
@endsection