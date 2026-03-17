<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '512M');

        $path = database_path('seeders/data/diem_thi_thpt_2024.csv');

        if (!file_exists($path)) {
            $this->command->error('scores.csv not found');
            return;
        }

        $handle = fopen($path, 'r');
        $header = fgetcsv($handle);

        $batchSize = 1000;
        $batchData = [];
        $count = 0;

        DB::disableQueryLog();

        while (($row = fgetcsv($handle)) !== false) {

            $csv = array_combine($header, $row);

            $batchData[] = [
                'sbd' => (int) $csv['sbd'],
                'toan' => $csv['toan'] !== '' ? $csv['toan'] : null,
                'ngu_van' => $csv['ngu_van'] !== '' ? $csv['ngu_van'] : null,
                'ngoai_ngu' => $csv['ngoai_ngu'] !== '' ? $csv['ngoai_ngu'] : null,
                'vat_li' => $csv['vat_li'] !== '' ? $csv['vat_li'] : null,
                'hoa_hoc' => $csv['hoa_hoc'] !== '' ? $csv['hoa_hoc'] : null,
                'sinh_hoc' => $csv['sinh_hoc'] !== '' ? $csv['sinh_hoc'] : null,
                'lich_su' => $csv['lich_su'] !== '' ? $csv['lich_su'] : null,
                'dia_li' => $csv['dia_li'] !== '' ? $csv['dia_li'] : null,
                'gdcd' => $csv['gdcd'] !== '' ? $csv['gdcd'] : null,
                'ma_ngoai_ngu' => $csv['ma_ngoai_ngu'] !== '' ? $csv['ma_ngoai_ngu'] : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $count++;

            if ($count % $batchSize === 0) {
                DB::table('scores')->insert($batchData);
                $batchData = [];
                gc_collect_cycles();
            }
        }

        if (!empty($batchData)) {
            DB::table('scores')->insert($batchData);
        }

        fclose($handle);

        $this->command->info("Import completed");
    }
}
