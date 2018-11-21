<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreExchange;
use App\Http\Requests\UpdateExchange;
use App\Exchange;
use Illuminate\Support\Facades\Auth;
use App\Exports\ExchangeExport;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExchangeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::user()->hasRole('Admin')) {
            $exchanges_wait = Exchange::waiting()->get();
            $exchanges_accepted = Exchange::accepted()->get();
            $exchanges_rejected = Exchange::rejected()->get();
    
            return view('dashboard.exchange.index_admin', compact('exchanges_wait', 'exchanges_accepted', 'exchanges_rejected'));
        } else if (Auth::user()->hasRole('Departemen')) {
            $exchanges_wait = Exchange::waiting()->where('id_user', Auth::user()->id)->get();
            $exchanges_accepted = Exchange::accepted()->where('id_user', Auth::user()->id)->get();
            $exchanges_rejected = Exchange::rejected()->where('id_user', Auth::user()->id)->get();
    
            return view('dashboard.exchange.index_departemen', compact('exchanges_wait', 'exchanges_accepted', 'exchanges_rejected'));
        } else {
            return redirect(route('home'));
        }
    }

    public function create() {
        return view('dashboard.exchange.create');
    }

    public function store(StoreExchange $request) {
        $image_path = $request->file('bukti')->store('image', 'public');
        $exchange = Exchange::create([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
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
            'nrp' => $request->nrp,
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

    public function accept($id) {
        $exchange = Exchange::findOrFail($id);
        $exchange->status = 1;
        $exchange->save();

        return redirect(route('exchange.index'));
    }

    public function reject(Request $request, $id) {
        $exchange = Exchange::findOrFail($id);
        $exchange->keterangan_reject = $request->keterangan;
        $exchange->status = 2;
        $exchange->save();

        return redirect(route('exchange.index'));
    }

    public function export() {
        return Excel::download(new ExchangeExport, 'exchange_'. Carbon::now()->format('Ymd') .'.xlsx');
    }
}
