@extends('layout.template')

@section('content')
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-8 py-8 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 border border-black px-4 py-2 rounded-lg">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 border border-black px-4 py-2 rounded-lg">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 border border-black px-4 py-2 rounded-lg">Register</a>
            @endif
        @endauth
    </div>
    @endif

    <section class="w-full h-screen flex flex-col items-center justify-center gap-8">
        <h2 class="text-[36px] font-bold">Welcome to List activity</h2>
    </section>
@endsection