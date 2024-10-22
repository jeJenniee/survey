@extends('layout.master')
@section('title', 'Kuesioner')
@section('content')
    @include('template.navuser')

    <div class="a my-5">
        <div class="container">
            <!-- Progress Bar -->
            <div class="progress-container mb-4">
                <div class="progress-step">
                    <a href="#"><i class="fa-solid fa-circle-check"></i> Data Diri</a>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <a href="#" class="text-primary">2) Kuesioner</a>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <a href="#">3) Kritik & Saran</a>
                </div>
            </div>

            <!-- Questionnaire Section -->
            <div class="card p-4 shadow">
                <h5>Petunjuk</h5>
                <h6 class="fw-normal">Harap mengisi kuisioner dengan memilih emoji: 😄 (YA), ☹ (TIDAK), 🤔 (MUNGKIN), 🙄
                    (TIDAK TAHU).</h6>
            </div>
            <div class="card p-4 shadow mt-4 py-5">
                <div class="py-4">

                    @if (session('message'))
                        <div class="alert alert-warning text-center mb-5">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- Display question number -->
                    <h4 class="text-center">{{ $index }}. {{ $question->pertanyaan }}</h4>
                    <form action="{{ route('postpertanyaan', $index) }}" method="POST">
                        @csrf
                        <input type="hidden" name="kuesioner_id" value="{{ $index }}">
                        <div class="d-flex justify-content-center mt-5 position-relative">
                            <button type="submit" name="jawaban" value="ya" class="btn" style="font-size: 3.5rem"
                                data-tooltip="Ya">😄</button>
                            <button type="submit" name="jawaban" value="tidak" class="btn" style="font-size: 3.5rem"
                                data-tooltip="Tidak">☹</button>
                            <button type="submit" name="jawaban" value="mungkin" class="btn" style="font-size: 3.5rem"
                                data-tooltip="Mungkin">🤔</button>
                            <button type="submit" name="jawaban" value="tidak tahu" class="btn"
                                style="font-size: 3.5rem" data-tooltip="Tidak Tahu">🙄</button>
                        </div>
                    </form>
                    
                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ route('pertanyaan', $index - 1) }}" data-tooltip="Sebelumnya"
                            class="btn b shadow px-3 py-4 text-white" style="background-color: #47D6B6">
                            <i class="fa-solid fa-chevron-left fs-5"></i>
                        </a>
                        <span class="mx-3 btn px-3 b py-3 text-white fs-4" data-tooltip="Jumlah pertanyaan"
                            style="background-color: #47D6B6">{{ $index }}/{{ $kuesionercount }}</span>

                        @if ($index < $kuesionercount)
                            <!-- Show "Next" button if not the last question -->
                            <a href="{{ route('pertanyaan', $index + 1) }}" data-tooltip="Selanjutnya"
                                class="btn b shadow px-3 py-4 text-white" style="background-color: #47D6B6">
                                <i class="fa-solid fa-chevron-right fs-5"></i>
                            </a>
                        @else
                            <!-- Disable the "Next" button on the last question -->
                            <a href="#" data-tooltip="Selanjutnya" class="btn b shadow px-3 py-4 text-white disabled"
                                style="background-color: #47D6B6; pointer-events: none; opacity: 0.6;">
                                <i class="fa-solid fa-chevron-right fs-5"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .btn {
        position: relative;
        /* Positioning for tooltip */
    }

    .b::after {
        bottom: 130% !important;
    }

    .btn::after {
        content: attr(data-tooltip);
        /* Tooltip text */
        position: absolute;
        bottom: 100%;
        /* Position above the button */
        left: 50%;
        transform: translateX(-50%);
        background-color: #47D6B6;
        /* Background color */
        color: #fff;
        /* Text color */
        padding: 5px;
        border-radius: 5px;
        white-space: nowrap;
        /* Prevent text wrapping */
        opacity: 0;
        /* Hide by default */
        transition: opacity 0.3s;
        /* Transition for fade-in effect */
        font-size: 1rem;
        /* Smaller font size */
    }

    .btn:hover::after {
        opacity: 1;
        /* Show tooltip on hover */
    }

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

    .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
</style>
