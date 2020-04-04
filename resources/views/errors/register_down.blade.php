@extends('website/layout')@section('content')@if(!empty($error))<p class="text">{{$error}}</p><div class="down"></div>@endif @endsection
@section('title')
@if(!empty($error)){{$error}}@endif | Wall of fame
@endsection