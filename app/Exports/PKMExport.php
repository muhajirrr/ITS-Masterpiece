<?php

namespace App\Exports;

use App\PKM;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PKMExport implements FromView
{
    public function view(): View {
        return view('exports.pkm', [
            'pkms' => PKM::accepted()->get()
        ]);
    }
}
