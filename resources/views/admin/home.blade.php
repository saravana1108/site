@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{route('admin.site_details')}}" >Update your site details(logo,discription,title,social link)</a><br>
                    <a href="{{route('admin.ad')}}" >view</a>`<br>
                   
                    <form action="{{route('admin.add_url')}}" method="post">
<input type="text" name="link">
<input type="submit">
{{ csrf_field() }}
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
