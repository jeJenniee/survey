@extends('layout.master')
@section('title', 'Data Diri')
@section('content')
    @include('template.navuser')
    <div class="a my-5">
        <div class="container">
            <div class="progress-container mb-4">
                <div class="progress-step">
                    <a href="#" class="active text-primary">1) Data Diri</a>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <a href="#">2) Kuesioner</a>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <a href="#">3) Kritik & Saran</a>
                </div>
            </div>
            <div class="card p-4 shadow">
                <h5>Petunjuk</h5>
                <h6 class="fw-normal">Harap Isi Informasi pribadi anda dengan lengkap. Setelah selesai, silahkan lanjutkan
                    dengan menekan tombol “Selanjutnya”</h6>
            </div>
            <div class="card p-4 shadow mt-4">
                <h4 class=" text-center">Data Diri</h4>
                <form action="{{ route('postdatadiri') }}" method="POST" class="form-group">
                    @csrf
                    <div class="mt-3">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control border-0" style="background-color: #ededed"
                            required>
                    </div>
                    <div class="mt-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control border-0"
                            style="background-color: #ededed">
                            <option value="" selected>-- Pilih --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="siswa_guru">Siswa/Guru</label>
                        <select name="siswa_guru" id="siswa_guru" class="form-control border-0"
                            style="background-color: #ededed" onchange="toggleKelasJurusan()">
                            <option value="" selected>-- Pilih --</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Guru">Guru</option>
                        </select>
                    </div>

                    <!-- Bagian Kelas dan Jurusan (hidden by default) -->
                    <div class="mt-3" id="kelas_jurusan_section" style="display: none;">
                        <div class="mt-3">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control border-0"
                                style="background-color: #ededed">
                                <option value="" selected disabled>-- Pilih Kelas --</option>
                                <option value="Kelas 10">Kelas 10</option>
                                <option value="Kelas 11">Kelas 11</option>
                                <option value="Kelas 12">Kelas 12</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control border-0"
                                style="background-color: #ededed">
                                <option value="" selected disabled>-- Pilih Jurusan --</option>
                                <option value="RPL">RPL</option>
                                <option value="TKJ">TKJ</option>
                                <option value="AKL">AKL</option>
                                <option value="MPLB">MPLB</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn w-100 text-white"
                            style="background-color: #47D6B6">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<style>
    .a {
        position: relative;
        overflow: hidden;
    }

    .progress-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .progress-step {
        display: flex;
        align-items: center;
        font-family: Arial, sans-serif;
    }

    .progress-step a {
        text-decoration: none;
        color: black;
    }

    .progress-line {
        flex-grow: 1;
        height: 2px; 
        background-color: lightgray;
        margin: 0 30px;
    }
</style>

<script>
    function toggleKelasJurusan() {
        var siswaGuru = document.getElementById('siswa_guru').value;
        var kelasJurusanSection = document.getElementById('kelas_jurusan_section');

        if (siswaGuru === 'Siswa') {
            kelasJurusanSection.style.display = 'block';
        } else {
            kelasJurusanSection.style.display = 'none';
        }
    }
</script>
