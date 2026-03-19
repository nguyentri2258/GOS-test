<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ReportController extends Controller
{
    public function index()
    {
        $subjects = [
            'toan' => 'Math',
            'ngu_van' => 'Literature',
            'ngoai_ngu' => 'English',
            'vat_li' => 'Physics',
            'hoa_hoc' => 'Chemistry',
            'sinh_hoc' => 'Biology',
            'lich_su' => 'History',
            'dia_li' => 'Geography',
            'gdcd' => 'Civic Education',
        ];

        return view('pages.report', compact('subjects'));
    }

    public function chart(Request $request)
    {
        $request->validate([
            'subject' => 'required|in:toan,ngu_van,ngoai_ngu,vat_li,hoa_hoc,sinh_hoc,lich_su,dia_li,gdcd',
        ]);

        $subject = $request->subject;

        $data = Score::selectRaw("
                COUNT(CASE WHEN {$subject} >= 8 THEN 1 END) as level_1,
                COUNT(CASE WHEN {$subject} < 8 AND {$subject} >= 6 THEN 1 END) as level_2,
                COUNT(CASE WHEN {$subject} < 6 AND {$subject} >= 4 THEN 1 END) as level_3,
                COUNT(CASE WHEN {$subject} < 4 THEN 1 END) as level_4
            ")
            ->whereNotNull($subject)
            ->first();

        return response()->json([
            'labels' => ['x >= 8', '8 > x >= 6', '6 > x >= 4', '4 > x'],
            'values' => [
                $data->level_1,
                $data->level_2,
                $data->level_3,
                $data->level_4,
            ],
        ]);
    }
}
