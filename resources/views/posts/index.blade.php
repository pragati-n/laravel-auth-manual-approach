@extends('posts.layout')
@section('content')

<div class="row">
    
   <div class="col-lg-12"> 
        <div class="pull-left">
           <h2> List of posts </h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('posts.create') }}" class="btn btn-primary"> Create post </a>
        </div>
    </div>

    <div class="error_msg">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
       <p> {{ $message }} </p>
    </div>
    @endif
    </div>
        
   
    <div class="col-lg-12"> 
        @if (count($posts) ==0 )
           <span>No posts found</span> 
        @else
        
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Action</th>
                </tr>
            @foreach ($posts as $post )
            <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->detail  }}</td>
                    <td>
                        <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-priamry"> show </a>
                            <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-priamry"> Edit </a>

                            
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="btn_delete" data-attr="{{ $post->id }}"> DELETE</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach   
            </table> 

            {!! $posts->links() !!}
        @endif
    </div>
</div>
   
@endsection