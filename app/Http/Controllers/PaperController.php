<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePaper;
use App\Http\Requests\UpdatePaper;
use App\Paper;
use Illuminate\Support\Facades\Auth;
use App\AnggotaPaper;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaperExport;
use Illuminate\Support\Carbon;

class PaperController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::user()->hasRole('Admin')) {
            $papers_wait = Paper::waiting()->get();
            $papers_accepted = Paper::accepted()->get();
            $papers_rejected = Paper::rejected()->get();

            return view('dashboard.paper.index_admin', compact('papers_wait', 'papers_accepted', 'papers_rejected'));
        } else if (Auth::user()->hasRole('Departemen')) {
            $papers_wait = Paper::waiting()->where('id_user', Auth::user()->id)->get();
            $papers_accepted = Paper::accepted()->where('id_user', Auth::user()->id)->get();
            $papers_rejected = Paper::rejected()->where('id_user', Auth::user()->id)->get();

            return view('dashboard.paper.index_departemen', compact('papers_wait', 'papers_accepted', 'papers_rejected'));
        } else {
            return redirect(route('paper.index'));
        }
    }

    public function create() {
        return view('dashboard.paper.create');
    }

    public function store(Request $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $paper = Paper::create([
            'judul' => $request->judul,
            'status_paper' => $request->status_paper,
            'bukti' => $image_path,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        foreach($request->anggota as $anggota) {
            if ($anggota['nama'] && $anggota['nrp'] && $anggota['angkatan']) {
                $anggota = AnggotaPaper::create([
                    'nama' => $anggota['nama'],
                    'nrp' => $anggota['nrp'],
                    'angkatan' => $anggota['angkatan'],
                    'id_paper' => $paper->id
                ]);
            }
        }

        return redirect(route('paper.index'));
    }

    public function edit($id) {
        $paper = Paper::findOrFail($id);

        return view('dashboard.paper.edit', compact('paper'));
    }

    public function update(Request $request, $id) {
        $paper = Paper::findOrFail($id);


        foreach ($paper->anggota as $anggota) {
            $anggota->delete();
        }

        if ($image = $request->file('bukti')) {
            $lomba->bukti = $image->store('image', 'public');
        }

        $paper->fill([
            'judul' => $request->judul,
            'status_paper' => $request->status_paper,
            'status' => 0
        ])->save();

        foreach($request->anggota as $anggota) {
            if ($anggota['nama'] && $anggota['nrp'] && $anggota['angkatan']) {
                $anggota = AnggotaPaper::create([
                    'nama' => $anggota['nama'],
                    'nrp' => $anggota['nrp'],
                    'angkatan' => $anggota['angkatan'],
                    'id_paper' => $paper->id
                ]);
            }
        }

        return redirect(route('paper.index'));
    }

    public function destroy($id) {
        $paper = Paper::findOrFail($id);
        $paper->delete();

        return redirect(route('paper.index'));
    }

    public function accept($id) {
        $paper = Paper::findOrFail($id);
        $paper->status = 1;
        $paper->save();

        return redirect(route('paper.index'));
    }

    public function reject(Request $request, $id) {
        $paper = Paper::findOrFail($id);
        $paper->keterangan_reject = $request->keterangan;
        $paper->status = 2;
        $paper->save();

        return redirect(route('paper.index'));
    }

    public function export() {
        return Excel::download(new PaperExport, 'paper_'. Carbon::now()->format('Ymd') .'.xlsx');
    }
}
