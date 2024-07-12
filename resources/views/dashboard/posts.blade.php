<x-layout title="Post by {{$post->user->username}}">
<h1>{{$post->title}}</h1>
<h2 class="text-md"> Contributors: </h2>
<form action="{{route('post.update', $post->id)}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <h2>Tag: </h2>
        <select name="tags" id="tags">
            <option value="select" disabled>Select an option</option>
            @foreach ($tags as $tag)
                @if ($tag === $post->tags)
                <option value="{{$post->tags}}" selected>{{$post->tags}}</option>
                @else 
                <option value="{{$tag}}">{{$tag}}</option>
                @endif            
            @endforeach
        </select>
    </div>    
    <button type="submit" class="btn btn-success">Update</button>
</form>

<a href="{{route('post.edit', $post->id)}}" class="btn btn-primary">Edit Post</a>

<form action="{{route('post.destroy', $post->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
</x-layout>