<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreKompetisi;
use App\Http\Requests\UpdateKompetisi;
use App\Kompetisi;

class KompetisiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $kompetisis = Kompetisi::all();

        return view('dashboard.kompetisi.index', compact('kompetisis'));
    }

    public function create() {
        return view('dashboard.kompetisi.create');
    }

    public function store(StoreKompetisi $request) {
        $image_path = $request->file('image')->store('image', 'public');
        $kompetisi = Kompetisi::create([
            'title' => $request->title,
            'title_slug' => str_slug($request->title),
            'image' => $image_path,
            'content' => $request->content
        ]);

        Session::flash('success', 'Post <b>'. $kompetisi->title .'</b> berhasil ditambahkan.');

        return redirect(route('kompetisi.index'));
    }

    public function edit($id) {
        $kompetisi = Kompetisi::findOrFail($id);

        return view('dashboard.kompetisi.edit', compact('kompetisi'));
    }

    public function update(UpdateKompetisi $request, $id) {
        $kompetisi = Kompetisi::findOrFail($id);

        if ($image = $request->file('image')) {
            $kompetisi->image = $image->store('image', 'public');
        }

        $kompetisi->fill([
            'title' => $request->title,
            'title_slug' => str_slug($request->title),
            'content' => $request->content
        ])->save();

        Session::flash('success', 'Post <b>'. $kompetisi->title .'</b> berhasil diubah.');

        return redirect(route('kompetisi.index'));
    }

    public function destroy($id) {
        $kompetisi = Kompetisi::findOrFail($id);
        $kompetisi->delete();

        Session::flash('success', 'Post <b>'. $kompetisi->title .'</b> berhasil dihapus.');

        return redirect(route('kompetisi.index'));
    }
}
