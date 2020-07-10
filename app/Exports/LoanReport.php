<?php

namespace App\Exports;

use App\loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LoanReport implements FromView, ShouldAutoSize
{
    public function __construct($from,$to) {
        $this->from = $from;
        $this->to = $to;
    }
    public function view(): View
    {
        return view('export.transaksi', [
            'loans' => loan::whereBetween('tanggal pinjam',[$this->from,$this->to])->get()
        ]);
    }
}
