@extends('website/layout')
@section('content')
@if(!empty($error))
<p class="text">{{ $error }} </p>

@endif
@endsection
