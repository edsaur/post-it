<x-layout title="Create Task">
    <main class="container">
       <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6">
                @if($errors->any())
                    <p class="text-danger">{{$errors->first()}}</p>
                @endif
                <form action="{{route('post.store')}}" method="post">
                    @csrf
                    <label for="title">Title</label>
                    <div>
                        <input type="text" name="title" id="title" />
                    </div>

                    <label for="description">Description (optional)</label>
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                    
                </form>
            </div>
       </div>
    </main>
</x-layout>