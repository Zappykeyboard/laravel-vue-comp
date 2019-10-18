@extends('welcome')

@section('content')
  @include('posttemplate')
  <div id="app">
    @foreach ($posts as $post)
      <post-box
        
        :title='"{{$post->title}}"'
        :author='"{{$post->author}}"'
        ></post-box>
    @endforeach
  </div>

@endsection
