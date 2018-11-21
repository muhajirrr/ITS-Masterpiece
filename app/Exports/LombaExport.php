<?php

namespace App\Exports;

use App\Lomba;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LombaExport implements FromView
{
    public function view(): View {
        return view('exports.lomba', [
            'lombas' => Lomba::accepted()->get()
        ]);
    }
}