@extends('website/layout')
@section('content')<div style="margin-top: 100px"></div>

<table>
    <tbody>
  
  
        <tr>
            <td></td>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Created at</td>
            </tr>
    @foreach ($users as $users)
        <tr >
          
        <td class=""><a href="{{url('/admin/user/'.$users->id)}}">Wijzig gegevens</a> </td>
        <td>{{$users->id}}</td>
        <td>{{$users->name}}</td>
        <td>{{$users->email}}</td>
        <td>{{$users->created_at}}</td>
        

        </tr>
    @endforeach
  </tbody>
    </table>

    <table>
        <tbody>
      
      
            <tr>
                <td></td>
                <td>ID</td>
                <td>Name</td>
               
                </tr>
        @foreach ($klassen as $klassen)
            <tr >
              
            <td class=""><a href="{{url('/admin/klas/'.$klassen->id)}}">Wijzig gegevens</a> </td>
            <td>{{$klassen->id}}</td>
            <td>{{$klassen->klas}}</td>
            <td></td>
            <td></td>
    
            </tr>
        @endforeach
      </tbody>
        </table>

  
@endsection