<x-layout title="Login">
    <main class="container">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-md=6">
                <form action="{{route('user.loginUser')}}" method="post">
                    
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                    @endforeach
                    @endif

                    @csrf

                    
                </form>
            </div>
        </div>
    </main>
</x-layout>