<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePKM;
use App\Http\Requests\UpdatePKM;
use App\PKM;
use App\AnggotaPkm;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PKMExport;
use Illuminate\Support\Carbon;

class PKMController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        if (Auth::user()->hasRole('Admin')) {
            $pkms_wait = PKM::waiting()->get();
            $pkms_accepted = PKM::accepted()->get();
            $pkms_rejected = PKM::rejected()->get();

            return view('dashboard.pkm.index_admin', compact('pkms_wait', 'pkms_accepted', 'pkms_rejected'));
        } else if (Auth::user()->hasRole('Departemen')) {
            $pkms_wait = PKM::waiting()->where('id_user', Auth::user()->id)->get();
            $pkms_accepted = PKM::accepted()->where('id_user', Auth::user()->id)->get();
            $pkms_rejected = PKM::rejected()->where('id_user', Auth::user()->id)->get();

            return view('dashboard.pkm.index_departemen', compact('pkms_wait', 'pkms_accepted', 'pkms_rejected'));
        } else {
            return redirect(route('pkm.index'));
        }
    }

    public function create() {
        return view('dashboard.pkm.create');
    }

    public function store(Request $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $pkm = PKM::create([
            'judul' => $request->judul,
            'juara' => $request->juara,
            'bukti' => $image_path,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        foreach($request->anggota as $anggota) {
            if ($anggota['nama'] && $anggota['nrp'] && $anggota['angkatan']) {
                $anggota = AnggotaPkm::create([
                    'nama' => $anggota['nama'],
                    'nrp' => $anggota['nrp'],
                    'angkatan' => $anggota['angkatan'],
                    'id_pkm' => $pkm->id
                ]);
            }
        }

        return redirect(route('pkm.index'));
    }

    public function edit($id) {
        $pkm = PKM::findOrFail($id);

        return view('dashboard.pkm.edit', compact('pkm'));
    }

    public function update(Request $request, $id) {
        $pkm = PKM::findOrFail($id);

        foreach ($pkm->anggota as $anggota) {
            $anggota->delete();
        }

        if ($image = $request->file('bukti')) {
            $pkm->bukti = $image->store('image', 'public');
        }

        $pkm->fill([
            'judul' => $request->judul,
            'juara' => $request->juara,
            'status' => 0,
            'id_user' => Auth::user()->id
        ])->save();

        foreach($request->anggota as $anggota) {
            if ($anggota['nama'] && $anggota['nrp'] && $anggota['angkatan']) {
                $anggota = AnggotaPkm::create([
                    'nama' => $anggota['nama'],
                    'nrp' => $anggota['nrp'],
                    'angkatan' => $anggota['angkatan'],
                    'id_pkm' => $pkm->id
                ]);
            }
        }

        return redirect(route('pkm.index'));
    }

    public function destroy($id) {
        $pkm = PKM::findOrFail($id);
        $pkm->delete();

        return redirect(route('pkm.index'));
    }

    public function accept($id) {
        $pkm = PKM::findOrFail($id);
        $pkm->status = 1;
        $pkm->save();

        return redirect(route('pkm.index'));
    }

    public function reject(Request $request, $id) {
        $pkm = PKM::findOrFail($id);
        $pkm->keterangan_reject = $request->keterangan;
        $pkm->status = 2;
        $pkm->save();

        return redirect(route('pkm.index'));
    }

    public function export() {
        return Excel::download(new PKMExport, 'pkm_'. Carbon::now()->format('Ymd') .'.xlsx');
    }
}
