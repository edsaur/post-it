<x-layout title="Signup">
<main class="container">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="col-md=6">
            <form action="{{route('user.store')}}" method="post">
                
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach
                @endif
                
                @csrf
                <label for="username">Username</label>
                <div class="mb-3">
                    <input type="text" name="username" id="username" value="{{old('username', '')}}" />
                </div>

                <label for="email">Email</label>
                <div class="mb-3">
                    <input type="text" name="email" id="email" value="{{old('email', '')}}">
                </div>

                <label for="password">Password</label>
                <div class="mb-3">
                    <input type="password" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</main>
</x-layout>