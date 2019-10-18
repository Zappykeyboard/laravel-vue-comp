@extends('welcome')

@section('content')
  @include('posttemplate')
  <div id="app">
      <post-box
        :id='"{{$post->id}}"'
        :title='"{{$post->title}}"'
        :author='"{{$post->author}}"'
        :content='"{{$post->content}}"'
        :likes = '{{$post->likes}}'
        ></post-box>
  </div>

@endsection
