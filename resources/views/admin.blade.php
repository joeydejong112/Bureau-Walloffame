@extends('layout')
@section('content')


<div class="col-md-10 about_intro intro_text" id="edit_about">
    <section class="showcase about mt-5">
        <section class="nes-container with-title">

            <h3 class="title">
               Wijzig eigen profile </h3>

            <p>

                <form class="kleinertext" action="updateUsersRed" method="POST">
                  @csrf
                    <div class="form-group">
                        <label for="text">Naam</label>
                        <input type="text" value="" name="name" class="form-control"
                            id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">background:</label>
                        <input type="text" value="" name="background" class="form-control"
                            id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">profile_image:</label>
                        <input type="text" value="" name="profile_image" class="form-control"
                            id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">opleiding:</label>
                        <input type="text" value="" name="opleiding"
                            class="form-control" id="text">
                    </div>
                    <div class="form-group">
                        <label for="text">github</label>
                        <input type="text" value="" name="github" class="form-control"
                            id="text">
                    </div> <div class="form-group">
                        <label for="text">gitlab</label>
                        <input type="text" value="" name="gitlab" class="form-control"
                            id="text">
                    </div> <div class="form-group">
                        <label for="text">LinkedIn</label>
                        <input type="text" value="" name="linkedin" class="form-control"
                            id="text">
                    </div>
                    <button type="submit" name="updateUsersRed" class="btn btn-default">Submit</button>
                </form>
            </p>
            <h3 class="title">
               Register new user </h3>
               <a href="/add">lol</a>
 
        </section>
    </section>


    <img class="about_img" src="http://joeydejong12.nl/images/pixel7.gif">

</div>



@endsection