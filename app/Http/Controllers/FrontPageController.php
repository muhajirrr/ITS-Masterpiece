<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KaryaMahasiswa;
use App\Kompetisi;
use App\Lomba;
use App\PKM;
use App\Paper;
use App\Exchange;

class FrontPageController extends Controller
{
    public function karya(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $karyas = KaryaMahasiswa::latest('created_at')->paginate(3);

        return view('frontpage.karya', compact('karyas'));
    }

    public function kompetisi(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $kompetisis = Kompetisi::latest('created_at')->paginate(3);

        return view('frontpage.kompetisi', compact('kompetisis'));
    }

    public function prestasi(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        return view('frontpage.prestasi');
    }

    public function lomba(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $lombas = Lomba::latest('created_at')->paginate(3);

        return view('frontpage.prestasi.lomba', compact('lombas'));
    }

    public function pkm(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $pkms = PKM::latest('created_at')->paginate(3);

        return view('frontpage.prestasi.pkm', compact('pkms'));
    }

    public function paper(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $papers = Paper::latest('created_at')->paginate(3);

        return view('frontpage.prestasi.paper', compact('papers'));
    }

    public function exchange(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }
        
        $exchanges = Exchange::latest('created_at')->paginate(3);

        return view('frontpage.prestasi.exchange', compact('exchanges'));
    }
}
