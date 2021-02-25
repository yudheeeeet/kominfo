<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function pengajuan()
    {
        $pengajuan = Pengajuan::all();

        return view('pengajuan', compact('pengajuan'));
    }

    public function detail_pengajuan($id)
    {
        $room = DB::table('rooms')->where('status', '=', 'Tersedia')->get();
        $pengajuan = Pengajuan::findOrFail($id);

        $feedback = DB::table('feedback')->where('pengajuan_id', $pengajuan["id"])->get();
        

        return view('detailPengajuan', compact('pengajuan','room','feedback'));
        
    }


    public function download($lampiran)
    {
        return response()->download('/storage'. $lampiran);
    }

    public function diterima($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'diterima';
        $pengajuan->save();

        return back()->with('status', 'data pengajuan diterima');
    }

    public function ditolak($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'ditolak';
        $pengajuan->save();

        return back()->with('status', 'data pengajuan ditolak');
    }

    public function tambah_feedback(Request $request, $id)
    {
        $this->validate($request, [
            'feedback' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback ->user_id = Auth::user()->id;
        $feedback ->pengajuan_id = $id;
        $feedback ->room = $request->input('room');
        $feedback ->feedback = $request->input('feedback');

        $feedback->save();

        DB::table('rooms')->where('id', '=', $request->input('room'))->update(['status'=>'Dipinjam']);

        return back();
    }
}
