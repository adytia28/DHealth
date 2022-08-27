@extends('layouts.app')

@section('content')
<div class="">
    <div class="flex items-center justify-center  p-4 md:p-8">
        <div class="text-center space-y-8">
            @auth
                <h3 class="text-2xl sm:text-3xl  lg:text-5xl font-bold text-sky-500">
                    Selamat datang <br>{{auth()->user()->name}}
                </h3>
                <p class="text-md sm:text-lg text-gray-500">
                    DHealth menawarkan benefit yang holistik kepada rumah sakit, <br>dimulai dari peningkatan pelayanan pasien sampai produktivitas pekerja rumah sakit. <br>Berikut adalah 4 nilai keunggulan DHealth, demi memberikan performansi terbaik bagi rumah sakit.
                </p>
                <p class="text-md sm:text-lg text-gray-500">
                    Silahkan <a href="{{route('receipe.create')}}" class="text-green-500 font-semibold">buat resep </a>atau lihat <a href="{{route('receipe.index')}}" class="text-green-500 font-semibold">daftar resep</a> yang telah ada.
                </p>
            @else
                <h3 class="text-2xl sm:text-3xl  lg:text-5xl font-bold text-sky-500">
                    A Fully Integrated Solution to  <br> Make Healthcare Services More “Human”
                </h3>
                <p class="text-md sm:text-lg text-gray-500">
                    Aplikasi SIMRS DHealth yang terdiri dari berbagai modul yang saling terintegrasi <br>demi membantu pelayanan rumah sakit untuk lebih optimal.
                </p>
                <p class="text-md sm:text-lg text-gray-500 ">
                    Silahkan <a href="{{route('register')}}" class="text-green-500 font-semibold">Sign Up</a> atau <a href="{{route('login')}}" class="text-green-500 font-semibold">Sign In</a> untuk dapat menambahkan resep obat dan melihat daftar resep
                </p>
            @endauth
        </div>
    </div>
</div>
@endsection
