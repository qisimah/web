@extends('auth.layout')
@section('content')
    {{--<div class="logo">--}}
        {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" width="80">--}}
    {{--</div>--}}
    <h1 style="font-size: 130px" class="m-0 text-muted fw-300">4<i class="ti-face-sad fs-100"></i>1</h1>
    <h4 class="fs-16 text-white fw-300">Not Authorized!</h4>
    <p class="text-muted mb-15">Yo! You may be treading on land mines, I will click the button below if I were you!</p>
    <a href="{{url('')}}" role="button" class="btn btn-primary">Return To Safety</a>
@endsection