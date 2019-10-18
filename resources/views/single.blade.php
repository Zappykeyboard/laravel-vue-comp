@extends('welcome')

@section('content')
  @include('posttemplate')
  <div id="app">
      <post-box
        :title='"{{$post->title}}"'
        :author='"{{$post->author}}"'
        :content='"{{$post->content}}"'
        :likes = '{{$post->likes}}'
        ></post-box>
  </div>

@endsection
