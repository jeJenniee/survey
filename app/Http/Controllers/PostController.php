<?php

namespace App\Http\Controllers;

use App\Models\kuesioner;
use App\Models\responden;
use App\Models\response;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function postdatadiri(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'siswa_guru' => 'required',
            'kelas' => 'nullable',
            'jurusan' => 'nullable',
        ]);

        $responden = responden::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'siswa_guru' => $request->siswa_guru,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        session(['responden_id' => $responden->id]);

        // Redirect to the first question
        return redirect()->route('pertanyaan', ['index' => 1]);
    }

    public function postpertanyaan(Request $request)
    {
        // Ambil responden_id dari sesi
        $respondenId = session('responden_id');
        $currentQuestion = $request->kuesioner_id;

        // Simpan atau perbarui jawaban
        response::updateOrCreate(
            [
                'responden_id' => $respondenId,
                'kuesioner_id' => $currentQuestion,
            ],
            [
                'jawaban' => $request->jawaban,
            ]
        );

        // Tentukan pertanyaan selanjutnya
        $nextQuestion = $currentQuestion + 1;

        // Cek apakah pertanyaan selanjutnya ada di tabel Kuesioner
        if (kuesioner::find($nextQuestion)) {
            return redirect()->route('pertanyaan', $nextQuestion);
        } else {
            // Hitung jumlah pertanyaan yang telah dijawab
            $answeredCount = response::where('responden_id', $respondenId)->count();
            $totalQuestions = Kuesioner::count();

            // Jika semua pertanyaan telah dijawab, alihkan ke halaman feedback
            if ($answeredCount == $totalQuestions) {
                return redirect()->route('feedback')->with('responden_id', $respondenId); // Kirim responden_id ke feedback page
            } else {
                // Jika belum, tampilkan pesan bahwa harus menjawab semua pertanyaan
                return redirect()->route('pertanyaan', $currentQuestion)->with('message', 'Harap jawab semua pertanyaan sebelum melanjutkan ke halaman feedback.');
            }
        }
    }
}
