<?php

namespace App\Exports;

use App\visitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Visitorlist implements FromView, ShouldAutoSize
{
    public function __construct($from,$to) {
        $this->from = $from;
        $this->to = $to;
    }
    public function view(): View
    {
        return view('export.visitor', [
            'visitor' => visitor::whereBetween('added_on',[$this->from,$this->to])->get()
        ]);
    }
}
