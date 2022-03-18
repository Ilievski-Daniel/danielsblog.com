@extends('dashboards.layouts.admin-dash-layout')
@section('title', 'Posts')

@section('content')
@if (Auth::user()->id == $id)   
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post Name</th>
        <th scope="col">Author</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @php $rowCounter = 1; @endphp
        @foreach($posts as $post)
      <tr>
        <th scope="row">{{$rowCounter}}</th>
        <td><a style="color: white" href="/post/{{$post->id}}">{{$post->postName}}</a></td>
        <td>{{Auth::user()->name}}</td>
        <td><button><a href="/edit-post/{{$post->id}}">📝</a></button></td>
        <td>
            <form action="/post-delete/{{$post->id}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" name="submit" value="delete">🗑️</button>    
            </form> 
        </td>
      </tr>
        @php $rowCounter = $rowCounter + 1; @endphp
      @endforeach
    </tbody>
  </table>
@else
    <script>
        window.location.href = "/login";
    </script>
@endif
@endsection