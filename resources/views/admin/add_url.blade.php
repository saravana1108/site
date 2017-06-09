@extends('admin.layout.auth')

@section('content')

  <div class="header">
@foreach($r as $rs)
   <h1>TITLE:</h1> {{$rs->title}}<br>
   <h3>URL:</h3><a href="{{$rs->url}}"> {{$rs->url}}</a><br>
@endforeach
    </div>

@endsection
