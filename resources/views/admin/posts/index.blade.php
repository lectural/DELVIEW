@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    <h1>Posts</h1>
    <table class="table">
       <thead>
         <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>

          </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td><img height="50" width="50" src="{{$post->photo ? $post->photo->file : '/images/no-image1.jpg' }}"></td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}" >{{$post->user->name}}</a></td>
{{--                <td>{{$post->category_id}}</td>--}}
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td>{{$post->title}}</td>
                <td>{{str_limit($post->body, 15)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
            @endforeach
        @endif

       </tbody>
     </table>

@stop