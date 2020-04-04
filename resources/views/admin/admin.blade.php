@extends('website/layout')
@section('title')
AdminPanel | Wall of fame
@endsection
@section('content')
<div style="margin-top: 100px"></div>
<h3 class="board">Studenten </h3>

<table>
    <tbody>
        <tr>
            <td class="td">ID</td>
            <td class="td">Name</td>
            <td class="td">Email</td>
            <td class="td">Zichtbaar</td>
     
            <td></td>
        </tr>
        @foreach ($users as $users)
        <div class="modal fade" id="confirm{{$users->id}}" tabindex="-1" role="dialog"
            aria-labelledby="confirm{{$users->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirm{{$users->id}}Label">Weet je het zeker?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Je gaat deze student verwijderen:</b></p>
                        <p>ID: {{$users->id}}</p>
                        <p>Naam: {{$users->name}}</p>
                        <p>Email: {{$users->email}}</p>
                        <p>ContactEmail: {{$users->contactemail}}</p>

                        <p>Klas: {{$users->klas}}</p>


                    </div>
                    <div class="modal-footer">
                        <a class="btn bg-success" data-dismiss="modal">terug</a>

                        <a href="{{url('/admin/user/delete/'.$users->id)}}" class="btn bg-danger">Delete</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirm{{$users->id}}{{$users->id}}" tabindex="-1" role="dialog"
            aria-labelledby="confirm{{$users->id}}{{$users->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirm{{$users->id}}{{$users->id}}Label">Wijzig roles voor
                            gebruiker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                    

                    <div class="modal-body">   

                @foreach($roles as $key => $role)
                @if ($role->user_id == $users->id)
                    Status: 
                    @if($role->role_id == 1)
                    User
                    <?php
                        $setup = "bg-secondary";
                        $user_ = "bg-success";
                        $admin = "bg-secondary";
                    ?>
                    @endif
                      @if($role->role_id == 2)
                        Admin
                        <?php
                        $setup = "bg-secondary";
                        $user_ = "bg-secondary";
                        $admin = "bg-success";
                    ?>
                    @endif
                      @if($role->role_id == 3)
                        Setup
                        <?php
                        $setup = "bg-success";
                        $user_ = "bg-secondary";
                        $admin = "bg-secondary";
                    ?>
                    @endif

                @endif
                @endforeach
                    </div>         
                    <div class="modal-footer">
                    
                        <a class="btn {{$setup}}" href="{{url('/admin/rank/setup/'.$users->id)}}">Setup</a>
                        <a class="btn {{$user_}}" href="{{url('/admin/rank/user/'.$users->id)}}">User</a>

                        <a class="btn {{$admin}}" href="{{url('/admin/rank/admin/'.$users->id)}}">Admin</a>
                        <a class="btn bg-success" data-dismiss="modal">terug</a>



                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="hide{{$users->id}}" tabindex="-1" role="dialog"
            aria-labelledby="hide{{$users->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hide{{$users->id}}Label">Wijzig zichtbaarheid voor
                            gebruiker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body zien">
                        <p><b>Status zichtbaarheid</b> <br>
                            @if($users->zien == 1)
                            <p class="aan">Is zichtbaar</p>

                            @endif
                            @if($users->zien == 0)
                            <p class="uit">Niet zichtbaar</p>
                            @endif
                        
                        
                        </p>
                    </div>
                    <div class="modal-footer">
                      

                        <a href="{{url('/admin/users/notshow/'.$users->id)}}" class="btn bg-danger">Hide</a>
                        <a href="{{url('/admin/users/show/'.$users->id)}}" class="btn bg-danger">show</a>

                        <a class="btn bg-success" data-dismiss="modal">terug</a>



                    </div>
                </div>
            </div>
        </div>
        <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            @if($users->zien == 1)
            <td>Ja</td>

            @endif
            @if($users->zien == 0)
            <td>Nee</td>

            @endif
            <td class="but bg-success"><a href="{{url('/admin/user/'.$users->id)}}">Edit</a> </td>

            @if($users->id == Auth::user()->id)

            @else
             <td class="but bg-danger "><a href="#" data-toggle="modal" data-target="#confirm{{$users->id}}">Del</a> </td>

            @endif
            <td class="but bg-secondary"><a href="#" data-toggle="modal"
                    data-target="#confirm{{$users->id}}{{$users->id}}">Roles</a> </td>
            <td class="but bg-danger"><a href="#" data-toggle="modal" data-target="#hide{{$users->id}}">hide</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>


<h3 class="board">Klassen </h3>

<table>
    <tbody>
        <tr>
            <td class="td">ID</td>
            <td class="td">Name</td>
            <td class="td">Zichtbaar</td>
        </tr>
        @foreach ($klassen as $klassen)
        <div class="modal fade" id="klas{{$klassen->klas}}" tabindex="-1" role="dialog"
            aria-labelledby="klas{{$klassen->klas}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="klas{{$klassen->klas}}Label">Weet je het zeker?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Je gaat deze klas verwijderen:</b></p>
                        <p>ID: {{$klassen->id}}</p>
                        <p>Naam: {{$klassen->klas}}</p>
                        <p>Niet zien: {{$klassen->zien}}</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn bg-success" data-dismiss="modal">terug</a>

                        <a href="{{url('/admin/klas/delete/'.$klassen->id)}}" class="btn bg-danger">Deletse</a>

                    </div>
                </div>
            </div>
        </div>
        <tr>


            <td>{{$klassen->id}}</td>
            <td>{{$klassen->klas}}</td>
            @if($klassen->zien == 0)
            <td>Ja</td>

            @endif
            @if($klassen->zien == 1)
            <td>Nee</td>

            @endif
            <td class="but bg-success"><a href="{{url('/admin/klas/'.$klassen->id)}}">Edit</a> </td>
            <td class="but bg-danger"><a href="#" data-toggle="modal" data-target="#klas{{$klassen->klas}}">Del</a>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>

<h3 class="board">Voeg klas toe </h3>
<form class="admin_klas" action="klasadd" method="POST">
    {!! csrf_field() !!}
    <div class="form-group admin_form">
        <label for="text"><b>Klas</b></label>
        <input type="text" value="" name="klas" class="form-control" id="text">
    </div>
    <input type="radio" id="male" name="zien" value="0" required>
    <label for="male">Zien</label><br>
    <input type="radio" id="male" name="zien" value="1" required>
    <label for="male">Niet zien</label><br>
    <button type="submit" name="updateUsersRed" class="btn btn-primary">Maak aan</button>
</form>
@foreach ($admin_control as $admin_control)

<h3 class="board">login / register regelaar</h3>
<div class="container">
    <div class="row">
        <div class="col-md-6 status">
            <h2>Status login / register</h2>
            <p>Rood =  uit </p>
            <p>Groen =  aan </p>
<div class="log_req">
            @if($admin_control->login == 0)
            <p class="uit">Login</p>
            @else
            <p class="aan">Login</p>
            @endif

            @if($admin_control->register == 0)
            <p class="uit">Register</p>
            @else
            <p class="aan">Register</p>
            @endif
</div>
        </div>
        <div class="col-md-6">
            <form class="admin_klas" action="login_register" method="POST">
                {!! csrf_field() !!}
                <label for="text"><b>login</b></label><br>
            
                <input type="radio" id="male" name="login" value="1" required>
                <label for="male">Aan</label><br>
                <input type="radio" id="male" name="login" value="0" required>
                <label for="male">Uit</label><br>
            
                <label for="text"><b>register</b></label><br>
            
                <input type="radio" id="male" name="register" value="1" required>
                <label for="male">Aan</label><br>
                <input type="radio" id="male" name="register" value="0" required>
                <label for="male">Uit</label><br>
                <button type="submit"  class="btn btn-success">Wijzig</button>
            </form>
        </div>
    </div>

</div>



@endforeach


@endsection
