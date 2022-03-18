@extends('dashboards.layouts.admin-dash-layout')
@section('title', 'Posts')

@section('content')
@if (Auth::user()->id == $id)   
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post Name</th>
        <th scope="col">Post Category</th>
        <th scope="col">Author</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach($posts as $post)
        <th scope="row">{{$post->id}}</th>
        <td><a style="color: white" href="/post/{{$post->id}}">{{$post->postName}}</a></td>
        <td>Category</td>
        <td>{{Auth::user()->name}}</td>
        <td>@mdo</td>
        <td>Otto</td>
        @endforeach
      </tr>
    </tbody>
  </table>
@else
    <script>
        window.location.href = "/login";
    </script>
@endif
@endsection