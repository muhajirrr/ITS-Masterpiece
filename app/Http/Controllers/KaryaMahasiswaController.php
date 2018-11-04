<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KaryaMahasiswa;

class KaryaMahasiswaController extends Controller
{
    public function index() {
        $karyas = KaryaMahasiswa::all();

        return view('dashboard.karya.index', compact('karyas'));
    }

    public function create() {
        return view('dashboard.karya.create');
    }

    public function store(Request $request) {
        $image_path = $request->file('image')->store('image', 'public');
        $karya = KaryaMahasiswa::create([
            'title' => $request->title,
            'title_slug' => str_slug($request->title),
            'image' => $image_path,
            'content' => $request->content
        ]);

        return redirect(route('karya.index'));
    }

    public function edit($id) {
        $karya = KaryaMahasiswa::findOrFail($id);

        return view('dashboard.karya.edit', compact('karya'));
    }

    public function update(Request $request, $id) {
        $karya = KaryaMahasiswa::findOrFail($id);

        if ($image = $request->file('image')) {
            $karya->image = $image->store('image', 'public');
        }

        $karya->fill([
            'title' => $request->title,
            'title_slug' => str_slug($request->title),
            'content' => $request->content
        ])->save();

        return redirect(route('karya.index'));
    }

    public function destroy($id) {
        $karya = KaryaMahasiswa::findOrFail($id);
        $karya->delete();

        return redirect(route('karya.index'));
    }
}