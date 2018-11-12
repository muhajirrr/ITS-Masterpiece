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

        return view('frontpage.karya.index', compact('karyas'));
    }

    public function read_karya($title) {
        $karya = KaryaMahasiswa::where('title_slug', $title)->firstOrFail();

        return view('frontpage.landing.read', compact('karya'));
    }

    public function kompetisi(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $kompetisis = Kompetisi::latest('created_at')->paginate(3);

        return view('frontpage.kompetisi.index', compact('kompetisis'));
    }

    public function prestasi(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        return view('frontpage.prestasi.index');
    }

    public function lomba(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $lombas = Lomba::where('status', 1)->latest('created_at')->paginate(3);

        return view('frontpage.prestasi.lomba', compact('lombas'));
    }

    public function pkm(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $pkms = PKM::where('status', 1)->latest('created_at')->paginate(3);

        return view('frontpage.prestasi.pkm', compact('pkms'));
    }

    public function paper(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }

        $papers = Paper::where('status', 1)->latest('created_at')->paginate(3);

        return view('frontpage.prestasi.paper', compact('papers'));
    }

    public function exchange(Request $request) {
        if (!$request->ajax()) {
            return redirect(route('landing'));
        }
        
        $exchanges = Exchange::where('status', 1)->latest('created_at')->paginate(3);

        return view('frontpage.prestasi.exchange', compact('exchanges'));
    }
}
