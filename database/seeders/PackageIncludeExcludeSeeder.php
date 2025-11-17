<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageIncludeExcludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $packages = Package::all();

        foreach ($packages as $package) {
            // Skip jika sudah ada data
            if ($package->include_items || $package->exclude_items) {
                continue;
            }

            // Data default include
            $includeItems = "Perlengkapan Umroh\nTiket Pesawat PP\nAkomodasi Hotel\nHandling\nAsuransi\nMakan 3x Sehari\nTransportasi Saudi\nMuthowif";

            // Data default exclude
            $excludeItems = "Passport\nKeperluan Pribadi\nTour di luar program\nKelebihan bagasi\nTiket domestik\nTip Guide";

            $package->update([
                'include_items' => $includeItems,
                'exclude_items' => $excludeItems,
            ]);
        }
    }
}
