<x-layout title="Home">
    <nav>
        <ul> 
            @guest
            <li><a href="{{route('user.signup')}}">Sign up</a></li>
            <li><a href="{{route('user.login')}}">Login</a></li>
            @else 
            <li>
                <form action="{{route('user.logoutUser')}}" method="POST">
                    @csrf
                    <button type="submit">Log-out</button>
                </form>
            </li>
            @endguest
        </ul>
    </nav>

    @if (session('success'))
        <p>{{session('success')}}</p>        
    @endif

    @auth
        <h1>Welcome {{$user->username}}! </h1>
        <h3>Proceed to your <a href="/">Dashboard</a></h3>
    @endauth
</x-layout>