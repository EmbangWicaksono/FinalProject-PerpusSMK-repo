<?php

namespace App\Exports;

use App\book_entry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BookEntry implements FromView, ShouldAutoSize
{
    public function __construct($from,$to) {
        $this->from = $from;
        $this->to = $to;
    }
    public function view(): View
    {
        return view('export.book', [
            'book_entry' => book_entry::whereBetween('tanggal masuk',[$this->from,$this->to])->get()
        ]);
    }
}
