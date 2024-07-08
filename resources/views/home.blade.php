<x-layout title="Home">
    <nav>
        <ul> 
            <li><a href="{{route('user.signup')}}">Sign up</a></li>
            <li><a href="{{route('user.login')}}">Login</a></li>
        </ul>
    </nav>

    @if (session('success'))
        <p>{{session('success')}}</p>        
    @endif

    
</x-layout>