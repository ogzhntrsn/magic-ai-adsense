<?php

namespace Database\Seeders;

use App\Services\AdsenseSettingService;
use Illuminate\Database\Seeder;

class AdsenseAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adsenseSettingsService = app(\App\Services\AdsenseSettingService::class);

        foreach (AdsenseSettingService::PAGES as $PAGE) {
            $adsenseSettingsService->create([
                'place' => $PAGE,
            ]);
        }
    }
}
