<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePKM;
use App\Http\Requests\UpdatePKM;
use App\PKM;

class PKMController extends Controller
{
    public function index() {
        $pkms = PKM::all();

        return view('dashboard.pkm.index', compact('pkms'));
    }

    public function create() {
        return view('dashboard.pkm.create');
    }

    public function store(StorePKM $request) {

    }

    public function edit($id) {
        $pkm = PKM::findOrFail($id);

        return view('dashboard.pkm.edit', compact('pkm'));
    }

    public function update(UpdatePKM $request) {

    }

    public function destroy($id) {
        $pkm = PKM::findOrFail($id);
        $pkm->delete();

        return redirect(route('pkm.index'));
    }
}
