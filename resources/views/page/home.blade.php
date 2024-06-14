@extends('main')

@section('content')
    <div class="w-full h-[80vh] flex justify-center items-center">
        <div class="text-center">
            <h1 class="font-semibold text-2xl">Selamat datang di keuangan</h1>
            <h1 class="font-semibold text-2xl"><a class="text-blue-600 hover:underline"
                    href="@if (Auth::check()) {{ route('keuangan') }}
                @else
                {{ route('login') }} @endif">Login</a>
                untuk mulai mengatur keuangan anda :)
            </h1>
        </div>
    </div>
@endsection
