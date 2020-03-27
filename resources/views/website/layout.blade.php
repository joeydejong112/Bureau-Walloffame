<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <html lang="nl">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Glu wall of fame by Joey de Jong ">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <script src="https://kit.fontawesome.com/d24ca64b2d.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Wall of Fame</title>
</head>return false
<body oncontextmenu="">
    <div class="container-fluid">
        <div class="row">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block">
            </span>
            <a style="color:black;" class="navbar-brand mr-5" href="/home">
                Grafisch lyceum / Wall of fame
            </a>
            <div class="w-100 text-right _resp_">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
            <ul class="navbar-nav ml-auto flex-nowrap">
               
                @yield('buttons')
                
                @guest


                @foreach ($website_control as $website_control) 
                    @if($website_control->login == 1)
                     <li class="nav-item ">
                        <a class="nav-link login_button" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif
                    @if($website_control->register == 1)
                    <li class="nav-item ">
                        <a class="nav-link login_button" href="{{ route('register') }}">{{ __('register') }}</a>
                    </li>
                    @endif


                @endforeach
                
                   
                   
                @else 
                    <li class="nav-item ">
                        <a style="color:black;padding:0px;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" v-pre>
                         
                            @if (Auth::user()->profile_image == 'default.png')
                                <img src="{{ asset('Website/default.png') }}"
                                 alt="{{Auth::user()->profile_image}} " class="profile_image_layout"  />
                               

                            @else
                                <img src="{{ asset($pathuser.'/'.Auth::user()->id .'/'. Auth::user()->profile_image) }}"
                                alt="{{Auth::user()->profile_image}}" class="profile_image_layout" />
    
                           @endif         
                         
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/details">
                                Eigen profiel
                            </a>
                            <a class="dropdown-item" href="/account">
                                Wijzig gegevens
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Log uit') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display_none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
        </div>
    </div>
    @if (trim($__env->yieldContent('topusers')))
        <div class="container-fluid">
            <div class="row topusers">
                <h3 class="board board_top">
                Top Studenten 
                </h3>
                @yield('topusers')
            </div>
        </div>
    @endif
    @if (trim($__env->yieldContent('users')))
        <div class="container-fluid">
            <div class="row user_resp">
                @yield('users')
            </div>
        </div>
    @endif
    @if (trim($__env->yieldContent('content')))
        <div class="content_height">
            @yield('content')
            @yield('footer')
        </div>
    @endif
    <script>
AOS.init({
    once: true,

  disable: function() {
    var maxWidth = 800;
    return window.innerWidth < maxWidth;
  }
});    </script>
</body>


</html>
