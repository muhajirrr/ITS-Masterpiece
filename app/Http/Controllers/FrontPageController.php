<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KaryaMahasiswa;
use App\Kompetisi;

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
}
