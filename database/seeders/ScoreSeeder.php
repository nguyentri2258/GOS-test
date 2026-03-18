<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '512M');
        DB::disableQueryLog();

        $path = database_path('seeders/data/diem_thi_thpt_2024.csv');

        if (!file_exists($path)) {
            $this->command->error('CSV file not found');
            return;
        }

        $handle = fopen($path, 'r');
        $header = fgetcsv($handle);

        $batchSize = 500;
        $batchData = [];

        DB::beginTransaction();

        try {
            while (($row = fgetcsv($handle)) !== false) {
                $csv = array_combine($header, $row);

                $batchData[] = [
                    'sbd' => (int) $csv['sbd'],
                    'toan' => $this->toFloat($csv['toan']),
                    'ngu_van' => $this->toFloat($csv['ngu_van']),
                    'ngoai_ngu' => $this->toFloat($csv['ngoai_ngu']),
                    'vat_li' => $this->toFloat($csv['vat_li']),
                    'hoa_hoc' => $this->toFloat($csv['hoa_hoc']),
                    'sinh_hoc' => $this->toFloat($csv['sinh_hoc']),
                    'lich_su' => $this->toFloat($csv['lich_su']),
                    'dia_li' => $this->toFloat($csv['dia_li']),
                    'gdcd' => $this->toFloat($csv['gdcd']),
                    'ma_ngoai_ngu' => $this->toInt($csv['ma_ngoai_ngu']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                if (count($batchData) >= $batchSize) {
                    DB::table('scores')->insert($batchData);
                    $batchData = [];
                }
            }

            if (!empty($batchData)) {
                DB::table('scores')->insert($batchData);
            }

            fclose($handle);

            DB::commit();
            $this->command->info("Import completed successfully");

        } catch (\Exception $e) {
            DB::rollBack();
            fclose($handle);
            $this->command->error("Error: " . $e->getMessage());
        }
    }

    private function toFloat($value)
    {
        return $value !== '' ? (float) $value : null;
    }

    private function toInt($value)
    {
        return $value !== '' ? (int) $value : null;
    }
}
