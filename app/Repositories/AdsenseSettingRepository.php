<?php

namespace App\Repositories;

use App\Models\AdsenseSetting;
use Illuminate\Database\Eloquent\Collection;

class AdsenseSettingRepository
{
    public function create($data): AdsenseSetting
    {
        return AdsenseSetting::create($data);
    }

    public function getSettings(): Collection
    {
        return AdsenseSetting::all();
    }

    public function saveSettings(AdsenseSetting $settings ,array $data): AdsenseSetting
    {
        $settings->update($data);
        $settings->save();

        return $settings;
    }

    public function getByPlace($place): AdsenseSetting
    {
        $adsenseSetting = AdsenseSetting::where('place', $place)->first();

        if (!$adsenseSetting) {
            $adsenseSetting = AdsenseSetting::create([
                'place' => $place,
            ]);
        }

        return $adsenseSetting;
    }
}