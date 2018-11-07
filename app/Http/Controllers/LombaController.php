<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLomba;
use App\Http\Requests\UpdateLomba;
use App\Lomba;

class LombaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $lombas = Lomba::all();

        return view('dashboard.lomba.index', compact('lombas'));
    }

    public function create() {
        return view('dashboard.lomba.create');
    }

    public function store(StoreLomba $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $lomba = Lomba::create([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'nama_lomba' => $request->nama_lomba,
            'juara' => $request->juara,
            'penyelenggara' => $request->penyelenggara,
            'bukti' => $image_path,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        return redirect(route('lomba.index'));
    }

    public function edit($id) {
        $lomba = Lomba::findOrFail($id);

        return view('lomba.edit', compact('lomba'));
    }

    public function update(UpdateLomba $request, $id) {
        $lomba = Lomba::findOrFail($id);

        if ($image = $request->file('bukti')) {
            $lomba->bukti = $image->store('image', 'public');
        }

        $lomba->fill([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'nama_lomba' => $request->nama_lomba,
            'juara' => $request->juara,
            'penyelenggara' => $request->penyelenggara,
            'status' => 0
        ])->save();

        return redirect(route('lomba.index'));
    }

    public function destroy($id) {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect(route('lomba.index'));
    }
}
