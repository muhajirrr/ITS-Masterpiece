<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreKaryaMahasiswa;
use App\Http\Requests\UpdateKaryaMahasiswa;
use Illuminate\Support\Facades\Session;
use App\KaryaMahasiswa;

class KaryaMahasiswaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $karyas = KaryaMahasiswa::all();

        return view('dashboard.karya.index', compact('karyas'));
    }

    public function create() {
        return view('dashboard.karya.create');
    }

    public function store(StoreKaryaMahasiswa $request) {
        $image_path = $request->file('image')->store('image', 'public');
        $karya = KaryaMahasiswa::create([
            'title' => $request->title,
            'title_slug' => str_slug($request->title),
            'image' => $image_path,
            'content' => $request->content
        ]);

        Session::flash('success', 'Post <b>'. $karya->title .'</b> berhasil ditambahkan.');

        return redirect(route('karya.index'));
    }

    public function edit($id) {
        $karya = KaryaMahasiswa::findOrFail($id);

        return view('dashboard.karya.edit', compact('karya'));
    }

    public function update(UpdateKaryaMahasiswa $request, $id) {
        $karya = KaryaMahasiswa::findOrFail($id);

        if ($image = $request->file('image')) {
            $karya->image = $image->store('image', 'public');
        }

        $karya->fill([
            'title' => $request->title,
            'title_slug' => str_slug($request->title),
            'content' => $request->content
        ])->save();

        Session::flash('success', 'Post <b>'. $karya->title .'</b> berhasil diubah.');

        return redirect(route('karya.index'));
    }

    public function destroy($id) {
        $karya = KaryaMahasiswa::findOrFail($id);
        $karya->delete();

        Session::flash('success', 'Post <b>'. $karya->title .'</b> berhasil dihapus.');

        return redirect(route('karya.index'));
    }
}