<?php

namespace App\Exports;

use App\book_suggestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SuggestReport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return book_suggestion::all();
    // }
    public function view(): View
    {
        return view('admin.exports', [
            'suggestion' => book_suggestion::all()
        ]);
    }
}
