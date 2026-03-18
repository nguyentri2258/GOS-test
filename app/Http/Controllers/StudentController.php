<?php

namespace App\Http\Controllers;

use App\Models\Score;

class StudentController extends Controller
{
    public function group_a()
    {
        $students = Score::selectRaw('
                sbd,
                toan,
                vat_li,
                hoa_hoc,
                (COALESCE(toan,0) + COALESCE(vat_li,0) + COALESCE(hoa_hoc,0)) as total_score
            ')
            ->whereNotNull('toan')
            ->whereNotNull('vat_li')
            ->whereNotNull('hoa_hoc')
            ->orderByDesc('total_score')
            ->limit(10)
            ->get();

        return view('pages.score', compact('students'));
    }
}
