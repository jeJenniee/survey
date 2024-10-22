@extends('layout.master')
@section('title', 'Home')
@section('content')
    @include('template.nav')
    <div class="a d-flex align-items-center">
        <div class="container">
            @if (session('success'))
                <div class="card p-5 shadow my-5">
                    <div class=" alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card p-5 shadow">
                <div class="row">
                    <div class="col-8">
                        <div>
                            <h1 style="font-weight: 900; font-size: 4rem; color: black;">Kuesioner Survey <br>SMKN 2 Sukabumi
                            </h1>
                        </div>
                        <div>
                            <h4 class=" fw-normal">Setiap penilaian yang bapak/ibu guru dan siswa berikan adalah suara yang
                                berarti bagi sekolah kami, dan kami sangat menghargai kontribusi anda dalam meningkatkan
                                kualitas & fasilitas kami</h4>
                        </div>
                        <div>
                            <a href="{{route('datadiri')}}" class="btn text-white fs-5 rounded-5 mt-2 shadow"
                                style="background-color: #47D6B6">Beri Penilaian <i class="fa-solid fa-star"></i></a>
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div>
                            <img src="{{ asset('img/Survey-animation.png') }}" width="405" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <div class="modal-body p-4">
                    <div class="d-flex">
                        <div>
                            <h5 class="modal-title" id="loginModalLabel">Login Admin</h5>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <form class="mt-4 form-group" method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" required class="form-control" id="email" placeholder="masukan email"
                                name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" required class="form-control" id="password"
                                placeholder="masukan password" name="password">
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" class=" form-check-input" name="checkbox">
                            <label for="checkbox" class=" form-check-label fw-bold">Ingat saya</label>
                        </div>
                        <div class="mb-3">
                            @if (session('notif'))
                                <div class="alert alert-danger">
                                    {{ session('notif') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn w-100 text-white"
                                style="background-color: #47D6B6">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .a {
        position: relative;
        overflow: hidden;
        height: 100vh;
    }

    .a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: -1;
        background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%2347D6B6" fill-opacity="1" d="M0,288L16,282.7C32,277,64,267,96,256C128,245,160,235,192,224C224,213,256,203,288,186.7C320,171,352,149,384,160C416,171,448,213,480,229.3C512,245,544,235,576,224C608,213,640,203,672,208C704,213,736,235,768,229.3C800,224,832,192,864,197.3C896,203,928,245,960,266.7C992,288,1024,288,1056,261.3C1088,235,1120,181,1152,176C1184,171,1216,213,1248,224C1280,235,1312,213,1344,218.7C1376,224,1408,256,1424,272L1440,288L1440,320L1424,320C1408,320,1376,320,1344,320C1312,320,1280,320,1248,320C1216,320,1184,320,1152,320C1120,320,1088,320,1056,320C1024,320,992,320,960,320C928,320,896,320,864,320C832,320,800,320,768,320C736,320,704,320,672,320C640,320,608,320,576,320C544,320,512,320,480,320C448,320,416,320,384,320C352,320,320,320,288,320C256,320,224,320,192,320C160,320,128,320,96,320C64,320,32,320,16,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
    }
</style>
