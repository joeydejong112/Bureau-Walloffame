@extends('website/layout')
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

                <form class="kleinertext" action="updateUsersRed" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="text">Naam</label>
                        <input type="text" value="{{$users->name}}" name="name" class="form-control"
                            id="text">
                    </div>

                    <div class="form-group">
                        <label for="text">Profiel achtergrond:</label>
                        <input type="text" value="{{$users->background}}" name="background" class="form-control"
                            id="text">
                            <label for="text"><b>Ondersteunt:</b> Links, HEX(#FF5733)</label>

                    </div>
                    <div class="form-group">

                        <label for="text">Profiel foto:</label>
                        <input type="file" value="{{$users->profile_image}}" name="profile_image" class="form-control"
                            id="text">
                        <label for="text"><b>supported:</b> jpeg,png,jpg,gif,svg max 2MB</label>

                    </div>
                          <img class="col-sm-6" id="preview"  src=""> 

                     <div class="form-group">
                        <label for="text">opleiding:</label>
                        <input type="text" value="{{$users->opleiding}}" name="opleiding"
                            class="form-control" id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">github</label>
                        <input type="text" value="{{$users->github}}" name="github" class="form-control"
                            id="text">
                    </div> <div class="form-group">
                        <label for="text">gitlab</label>
                        <input type="text" value="{{$users->gitlab}}" name="gitlab" class="form-control"
                            id="text">
                    </div> 
                    <div class="form-group">
                        <label for="text">LinkedIn</label>
                        <input type="text" value="{{$users->github}}" name="linkedin" class="form-control"
                            id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">About</label>
                        <input type="text" value="{{$users->about}}" name="about" class="form-control textbox"
                            id="text">
                    </div> 
                    <div class="form-group">
                        <label for="text">Website</label>
                        <input type="text" value="{{$users->website}}" name="website" class="form-control"
                            id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">Contact email</label>
                        <input type="text" value="{{$users->contactemail}}" name="contactemail" class="form-control"
                            id="text">
                    </div> 
                    <button type="submit" name="updateUsersRed" class="btn btn-default">Submit</button>
                </form>
            </p>





</div>


@endsection