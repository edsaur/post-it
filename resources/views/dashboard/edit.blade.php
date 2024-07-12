<x-layout title="edit">
    <main class="container">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6">
                @if($errors->any())
                    <p class="text-danger">{{$errors->first()}}</p>
                @endif
                <form action="{{route('post.update', $post->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="title">Title</label>
                    <div>
                        <input type="text" name="title" id="title" value="{{$post->title}}" />
                    </div>

                    <label for="description">Description (optional)</label>
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10">{{$post->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Edit</button>
                    
                </form>
            </div>
       </div>
    </main>
</x-layout>