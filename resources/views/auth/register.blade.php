@extends('website/layout')
@section('content')
<div class="container" >
    <div class="row justify-content-center" style="padding-top: 100px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Maak een account aan ') }}</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Bevestig wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Opleiding" class="col-md-4 col-form-label text-md-right">{{ __('Opleiding') }}</label>

                            <div class="col-md-6">
                                <input id="opleiding" type="text" class="form-control" name="opleiding" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('Github link:') }}</label>

                            <div class="col-md-6">
                                <input id="github" type="text" class="form-control" name="github"  >                            
                                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gitlab" class="col-md-4 col-form-label text-md-right">{{ __('Gitlab link:') }}</label>

                            <div class="col-md-6">
                                <input id="gitlab" type="text" class="form-control" name="gitlab"  >                           
                                 <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="linkedin" class="col-md-4 col-form-label text-md-right">{{ __('linkedin link:') }}</label>

                            <div class="col-md-6">
                                <input id="linkedin" type="text" class="form-control" name="linkedin"  >
                                <label for="text"><b>Note:</b>Laat leeg als je het het niet hebt</label>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="klas" class="col-md-4 col-form-label text-md-right">{{ __('klas') }}</label>
                            
                            <div class="col-md-6">
                                <select style="width:100%;"name="klas">
                                    @foreach ($klassen as $klassen)
                                  
                                <option value="{{$klassen->klas}}"> {{$klassen->klas}}</option>

                                    @endforeach  
                                 



                                  </select>
                           
                                </div>
                        </div>
                        @if($errors->any())
                        <div class="row collapse">
                            <ul class="alert-box warning radius">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Maak account aan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
