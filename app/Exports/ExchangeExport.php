<?php

namespace App\Exports;

use App\Exchange;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExchangeExport implements FromView
{
    public function view(): View {
        return view('exports.exchange', [
            'exchanges' => Exchange::accepted()->get()
        ]);
    }
}
