@extends('admin.layout.auth')

@section('content')
<div id="page-wrapper">
 


<div class="col-lg-8">
    <section class="row new-post">
       <div class="col-md-6 c0l-md-offset-3">
        
         <form action="{{route('admin.update_details')}}" method="post" enctype="multipart/form-data" >
         @foreach($user as $u)
              <div class="form-group">
               <label for="title">title</label>
                <input  type="text" name="title" class="form-control" value="{{$u->title}}" id="title">
                <label for="link">Social link</label>
                <input  type="text" name="link" class="form-control" value="{{$u->link}}" id="link">
                <label for="discription">discription</label>
                <input type="text" name="discription" class="form-control" value="{{$u->discription}}" id="discription">
                <input  type="hidden" name="id" class="form-control" value="{{$u->id}}" id="id"> 
                
               
              </div>
              <div class="form-group">
                 <label for="logo">logo</label>
                 <input  type="file" name="logo" class="form-control" id="logo"></div>
                 <button type="submit" class="btn btn-success">Update</button>
                 {{ csrf_field() }}
         </form>
         @endforeach
       </div>
@if (Storage::disk('local')->has(Auth::user()->name.'-'.Auth::user()->id.'.jpg'))
     <section class="row new-post">
       <div class="col-md-6 c0l-md-offset-3">
          <img src="{{ route('account.logo',['filename'=>Auth::user()->name.'-'.Auth::user()->id.'.jpg' ])}}" alt="" class="img-responsive">
       </div>
@endif
      </div>
   </div>
</div>
@endsection
