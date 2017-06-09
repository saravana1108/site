@extends('admin.layout.auth')
@section('content')
@foreach($user as $u)
 <h2><strong><t>TITLE:{{$u->title}}</t></strong></h2>
 <img src="/uploads/avatar/{{($u->logo)}}" style="width:150px; height=150px; float:left; border-radius:50%; margin-right:25px;"><br><br><h1><i><font size='4'>{{$u->discription}}</font></i></h1><br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <a href="{{$u->link}}"><button style="font-size:24px" colour:blue>FACEBOOK <i class="fa fa-facebook-square"></i></button></a>                    
     @endforeach
     @endsection
    
     