@extends('posts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>

    


</div>

<div class="row">
    <div class="col-lg-12">
        <ul>
        
            <li>{{ $post->name }} </li>
            <li>{{ $post->detail }} </li>
       
        </ul>
    </div>
</div>


<div class="content-div">
    <h2> content header </h2>
    <p> content body</p>

</div>
@endsection

