<?php

namespace App\Exports;

use App\book_suggestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SuggestReport implements FromView, ShouldAutoSize
{

    public function view(): View
    {
        return view('admin.exports', [
            'suggestion' => book_suggestion::all()
        ]);
    }
}
