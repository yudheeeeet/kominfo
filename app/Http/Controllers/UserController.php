<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use App\User;
use App\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function user()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('/user', compact('user'));
    }

    public function permohonan()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('/permohonan', compact('user'));
    }

    public function SemuaPermohonan()
    {
        $user = User::findOrFail(Auth::user()->id);
        $pengajuan = Pengajuan::where('user_id', Auth::user()->id)->get();


        return view('/SemuaPermohonan', compact('pengajuan', 'user'));
    }

    public function getDataFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        return json_encode($feedback);
    }

    public function lihatFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
    }

    public function tambah_data_permohonan(Request $request)
    {
        $this->validate($request, [
            'acara' => 'required',
            'peserta' => 'required',
            'durasi' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'cp' => 'required',
            'lampiran' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf',
            ]);
        
            $pengajuan = new Pengajuan();
            $pengajuan ->user_id = Auth::user()->id;
            $pengajuan ->acara = $request->input('acara');
            $pengajuan ->peserta = $request->input('peserta');
            $pengajuan ->durasi = $request->input('durasi');
            $pengajuan ->mulai = $request->input('mulai');
            $pengajuan ->akhir = $request->input('akhir');
            $pengajuan ->cp = $request->input('cp');
            
            if ($request->file('lampiran')) {
                $file_path = $request->file('lampiran')->store('file_lampiran', 'public');
                $pengajuan->lampiran = $file_path;
            }

            $pengajuan ->save();

            return redirect()->route('SemuaPermohonan');
    }
    public function detail_permohonan($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $pengajuan = Pengajuan::findOrFail($id);

        return view('detailPermohonan', compact('pengajuan','user'));
    }

    public function updatePermohonan(Request $request, $id)
    {
        $this->validate($request, [
            'acara' => 'required',
            'peserta' => 'required',
            'durasi' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'cp' => 'required',
            'lampiran' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf',
            ]);

        $pengajuan = Pengajuan::findOrFail($id);

        $pengajuan ->user_id = Auth::user()->id;
        $pengajuan ->acara = $request->input('acara');
        $pengajuan ->peserta = $request->input('peserta');
        $pengajuan ->durasi = $request->input('durasi');
        $pengajuan ->mulai = $request->input('mulai');
        $pengajuan ->akhir = $request->input('akhir');
        $pengajuan ->cp = $request->input('cp');

        if ($request->file('lampiran')) {
            if ($pengajuan->lampiran && file_exists(storage_path('app/public/' . $pengajuan->lampiran))) {
                Storage::delete('public/' . $pengajuan->lampiran);
            }
            $file_path = $request->file('lampiran')->store('file_lampiran', 'public');
            $pengajuan->lampiran = $file_path;   
        }

        $pengajuan->save();

        return back()->with('berhasil', 'data pengajuan berhasil diubah');
    }
}
