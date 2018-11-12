<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreExchange;
use App\Http\Requests\UpdateExchange;
use App\Exchange;

class ExchangeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $exchanges = Exchange::all();

        return view('dashboard.exchange.index', compact('exchanges'));
    }

    public function create() {
        return view('dashboard.exchange.create');
    }

    public function store(StoreExchange $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $exchange = Exchange::create([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'keterangan' => $request->keterangan,
            'bukti' => $image_path,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        return redirect(route('exchange.index'));
    }

    public function edit($id) {
        $exchange = Exchange::findOrFail($id);

        return view('dashboard.exchange.edit', compact('exchange'));
    }

    public function update(UpdateExchange $request, $id) {
        $exchange = Exchange::findOrFail($id);

        if ($image = $request->file('bukti')) {
            $lomba->bukti = $image->store('image', 'public');
        }

        $exchange->fill([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'keterangan' => $request->keterangan,
            'status' => 0
        ])->save();

        return redirect(route('exchange.index'));
    }

    public function destroy($id) {
        $exchange = Exchange::findOrFail($id);
        $exchange->delete();

        return redirect(route('exchange.index'));
    }
}
