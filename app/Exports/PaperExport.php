<?php

namespace App\Exports;

use App\Paper;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaperExport implements FromView
{
    public function view(): View {
        return view('exports.paper', [
            'papers' => Paper::accepted()->get()
        ]);
    }
}
