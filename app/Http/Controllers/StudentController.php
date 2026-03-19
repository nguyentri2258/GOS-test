<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->get('group', 'A00');

        switch ($group) {
            case 'A01':
                $subjects = ['toan', 'vat_li', 'ngoai_ngu'];
                break;
            case 'B00':
                $subjects = ['toan', 'hoa_hoc', 'sinh_hoc'];
                break;
            case 'C00':
                $subjects = ['ngu_van', 'lich_su', 'dia_li'];
                break;
            case 'D01':
                $subjects = ['toan', 'ngu_van', 'ngoai_ngu'];
                break;
            default:
                $subjects = ['toan', 'vat_li', 'hoa_hoc'];
        }

        $students = Score::selectRaw("
                sbd,
                {$subjects[0]},
                {$subjects[1]},
                {$subjects[2]},
                (COALESCE({$subjects[0]},0)
                + COALESCE({$subjects[1]},0)
                + COALESCE({$subjects[2]},0)) as total_score
            ")
            ->whereNotNull($subjects[0])
            ->whereNotNull($subjects[1])
            ->whereNotNull($subjects[2])
            ->orderByDesc('total_score')
            ->limit(10)
            ->get();

        return view('pages.student', compact('students', 'group', 'subjects'));
    }
}
