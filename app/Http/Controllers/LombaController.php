<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLomba;
use App\Http\Requests\UpdateLomba;
use App\Lomba;
use App\AnggotaLomba;
use Illuminate\Support\Facades\Auth;

class LombaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::user()->hasRole('Admin')) {
            $lombas_wait = Lomba::where('status', 0)->get();
            $lombas_accepted = Lomba::where('status', 1)->get();
            $lombas_rejected = Lomba::where('status', 2)->get();
    
            return view('dashboard.lomba.index_admin', compact('lombas_wait', 'lombas_accepted', 'lombas_rejected'));
        } else if (Auth::user()->hasRole('Departemen')) {
            $lombas_wait = Lomba::where('status', 0)->where('id_user', Auth::user()->id)->get();
            $lombas_accepted = Lomba::where('status', 1)->where('id_user', Auth::user()->id)->get();
            $lombas_rejected = Lomba::where('status', 2)->where('id_user', Auth::user()->id)->get();
    
            return view('dashboard.lomba.index_departemen', compact('lombas_wait', 'lombas_accepted', 'lombas_rejected'));
        } else {
            return redirect(route('lomba.index'));
        }
    }

    public function create() {
        return view('dashboard.lomba.create');
    }

    public function store(Request $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $lomba = Lomba::create([
            'nama_lomba' => $request->nama_lomba,
            'juara' => $request->juara,
            'penyelenggara' => $request->penyelenggara,
            'bukti' => $image_path,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        foreach($request->anggota as $anggota) {
            if ($anggota['nama'] && $anggota['nrp'] && $anggota['angkatan']) {
                $anggota = AnggotaLomba::create([
                    'nama' => $anggota['nama'],
                    'nrp' => $anggota['nrp'],
                    'angkatan' => $anggota['angkatan'],
                    'id_lomba' => $lomba->id
                ]);
            }
        }

        return redirect(route('lomba.index'));
    }

    public function edit($id) {
        $lomba = Lomba::findOrFail($id);

        return view('dashboard.lomba.edit', compact('lomba'));
    }

    public function update(Request $request, $id) {
        $lomba = Lomba::findOrFail($id);

        foreach ($lomba->anggota as $anggota) {
            $anggota->delete();
        }

        if ($image = $request->file('bukti')) {
            $lomba->bukti = $image->store('image', 'public');
        }

        $lomba->fill([
            'nama_lomba' => $request->nama_lomba,
            'juara' => $request->juara,
            'penyelenggara' => $request->penyelenggara,
            'status' => 0
        ])->save();

        foreach($request->anggota as $anggota) {
            if ($anggota['nama'] && $anggota['nrp'] && $anggota['angkatan']) {
                $anggota = AnggotaLomba::create([
                    'nama' => $anggota['nama'],
                    'nrp' => $anggota['nrp'],
                    'angkatan' => $anggota['angkatan'],
                    'id_lomba' => $lomba->id
                ]);
            }
        }

        return redirect(route('lomba.index'));
    }

    public function destroy($id) {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect(route('lomba.index'));
    }

    public function accept($id) {
        $lomba = Lomba::findOrFail($id);
        $lomba->status = 1;
        $lomba->save();

        return redirect(route('lomba.index'));
    }

    public function reject(Request $request, $id) {
        $lomba = Lomba::findOrFail($id);
        $lomba->keterangan_reject = $request->keterangan;
        $lomba->status = 2;
        $lomba->save();

        return redirect(route('lomba.index'));
    }
}
