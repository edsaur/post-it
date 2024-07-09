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

                    <label for="username">Write your username or email</label>
                    <div>
                        <input type="text" name="username" id="username" />
                    </div>
                    
                    <label for="password">Password</label>
                    <div>
                        <input type="password" name="password" id="password">
                    </div>

                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </main>
</x-layout>