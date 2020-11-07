@extends('layouts.ap')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
   @foreach($posts as $post)
      <h2>{{ $post->title }}</h2>
      <p>{{ $post->body }}</p>
      <div>
                <strong>Tag:</strong>
                @foreach($post->tags as $tag)
                    <label class="badge badge-warning">{{ $tag->name }}</label>
                @endforeach
            </div>
      @endforeach
    </div>

   
</body>
 @endsection