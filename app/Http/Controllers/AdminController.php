<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function akun()
    {
        $user = User::whereHas('roles', function($q){
            $q->where('name', 'user');
        })->get();
        return view('akun', compact('user'));
    }

    public function tambah_data_user(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'user_login' => 'required',
            'password' => 'required|min:7',
            'password_confirmation' => 'required|same:password|min:7'
        ]);

        $user = new \App\User;
        $user_role = Role::where('name', 'user')->first();

        $user ->name = $request->input('name');
        $user ->email = $request->input('email');
        $user ->user_login = $request->input('user_login');
        $user ->password = bcrypt($request->input('password'));
        $user ->save();
        
        $user->roles()->attach($user_role);

        return back();
    }

    public function edit_akun($id)
    {
        $user = User::findOrFail($id);
        return view('editAkun', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // dd($user->email);
        if ($request->input('email') !== $user->email){
            $this->validate($request, [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'user_login' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'user_login' => 'required'
            ]);  
        }
        $user = User::findOrFail($id);
        // dd($user);
        User::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'user_login' => $request->input('user_login')
            ]);

        // dd($user);
        return redirect()->action('AdminController@akun')->with('berhasil', 'data berhasil diubah');
    }
    public function hapusUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
        return back();
        
    }

    public function rekap()
    {
        return view('rekap');
    }

    public function room()
    {
        $room = Room::all();
        return view('room', compact('room'));
    }

    public function tambah_data_room(Request $request)
    {
        $this->validate($request, [
            'room_name' => 'required',
            'link' => 'required',
            'Meeting_ID' => 'required',
            'Passcode' => 'required',
            'mulai_penyewaan' => 'required',
            'akhir_penyewaan' => 'required',
            ]);
            
            // dd($request->all());
            $room = new Room();
            $room ->room_name = $request->input('room_name');
            $room ->link = $request->input('link');
            $room ->Meeting_ID = $request->input('Meeting_ID');
            $room ->Passcode = $request->input('Passcode');
            $room ->mulai_penyewaan= $request->input('mulai_penyewaan');
            $room ->akhir_penyewaan = $request->input('akhir_penyewaan');
            
            $room ->save();
            
            
            return back();
    }

    public function edit_room($id)
    {
        $room = Room::findOrFail($id);
        return view('editRoom', compact('room'));
    }

    public function updateRoom(Request $request, $id)
    {
        // return $request;
        $this->validate($request, [
            'room_name' => 'required',
            'link' => 'required',
            'Meeting_ID' => 'required',
            'Passcode' => 'required',
            'mulai_penyewaan' => 'required',
            'akhir_penyewaan' => 'required',
        ]);

        $room = Room::findOrFail($id);
        $room->room_name = $request->input('room_name');
        $room->link = $request->input('link');
        $room->Meeting_ID = $request->input('Meeting_ID');
        $room->Passcode = $request->input('Passcode');
        $room->mulai_peminjaman = $request->input('mulai_peminjaman');
        $room->akhir_peminjaman = $request->input('akhir_peminjaman');
        $room->durasi_peminjaman = $request->input('durasi_peminjaman');
        $room ->mulai_penyewaan= $request->input('mulai_penyewaan');
        $room ->akhir_penyewaan = $request->input('akhir_penyewaan');
        $room->status = $request->input('status');

        $room->save();

        //  $penyewaan = [
        //     'mulai_peminjaman'=>$request->input('mulai_peminjaman'),
        //     'akhir_peminjaman'=>$request->input('akhir_peminjaman'),
        //     'durasi_peminjaman'=>$request->input('durasi')
        // ];

        // DB::table('rooms')->where('id', '=', $id)->update($penyewaan);

        return redirect()->action('AdminController@room')->with('berhasil', 'data berhasil diubah');
    }

    public function hapusRoom(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $room->delete();
        return back();
    }


}
