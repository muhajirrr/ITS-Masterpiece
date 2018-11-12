<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePaper;
use App\Http\Requests\UpdatePaper;
use App\Paper;

class PaperController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $papers = Paper::all();

        return view('dashboard.paper.index', compact('papers'));
    }

    public function create() {
        return view('dashboard.paper.create');
    }

    public function store(StorePaper $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $paper = Paper::create([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'judul' => $request->judul,
            'status_paper' => $request->status_paper,
            'bukti' => $image_path,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        return redirect(route('paper.index'));
    }

    public function edit($id) {
        $paper = Paper::findOrFail($id);

        return view('dashboard.paper.edit', compact('paper'));
    }

    public function update(UpdatePaper $request, $id) {
        $paper = Paper::findOrFail($id);

        if ($image = $request->file('bukti')) {
            $lomba->bukti = $image->store('image', 'public');
        }

        $paper->fill([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'judul' => $request->judul,
            'status_paper' => $request->status_paper,
            'status' => 0
        ])->save();

        return redirect(route('paper.index'));
    }

    public function destroy($id) {
        $paper = Paper::findOrFail($id);
        $paper->delete();

        return redirect(route('paper.index'));
    }
}
