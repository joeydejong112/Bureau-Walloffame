@extends('website/layout')
@section('title')
Welcome | Wall of fame
@endsection
@section('welcome')
 <div class="container-fluid" style="height: 100%;">
            <div class="row welcome">
                <div class="col-md-6 left ">
                    <div class="align_welcome" data-aos="fade-right">
                        <h2 >Grafisch Lyceum <br>
                            <&#47;> Wall of Fame
                        </h2>
                        <p>Gemaakt door studenten voor studenten</p>
                        <p>Made with <i style="color:red;" class="fas fa-heart"></i> </p>
                        <a href="/home" class="btn btn-block btn-lg btn-default">Enter</a>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="image_align_welcome" data-aos="fade-left">
                        <img src="https://www.glr.nl/sites/bd_glr_nl/files/styles/square/public/usercontent/gallery/meriem-fenzar-lifestyle-media-muur-visual-meriem-fenzar-g2m3.jpg?itok=gAB4KHzS"
                            alt="art" />
                        <p>"Made by <a href="https://www.glr.nl/gallery/student/1842">Meriem Fenzar </a>Grafisch lyceum
                            rotterdam"</p>
                    </div>
                </div>
            </div>
        </div>

@endsection