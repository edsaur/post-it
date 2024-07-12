<x-layout title='Dashboard'>
    @if (session('success'))
        <p>{{session('success')}}</p>
    @endif
    <a href="{{route('post.create')}}" class="btn btn-primary">Create Task</a>
    @if ($posts->isNotEmpty())
        @if(session('error')) 
            <p>{{session('error')}}</p>
        @endif

    @foreach ($posts as $post)
        <p><a href="{{route('post.show', $post->id)}}">{{ $post->title }} by {{ $post->user->username }}</a></p>
    @endforeach
@else 
    @if(session('error')) 
        <p>{{session('error')}}</p>     
    @endif
    <h1>No Tasks Yet!</h1>
@endif
</x-layout>