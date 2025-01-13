<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdsenseSetting;
use App\Services\AdsenseSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdsenseSettingController extends Controller
{
    protected $service;

    public function __construct(AdsenseSettingService $service)
    {
        $this->service = $service;
    }

    public function update(Request $request, AdsenseSetting $adsenseSetting): RedirectResponse
    {
        $request->validate([
            'adsense_code' => 'nullable|string',
        ]);

        $this->service->update($adsenseSetting, $request->only('adsense_code'));

        return redirect()->route('dashboard.admin.frontend.adsense.settings')->with('success', 'Settings updated successfully.');
    }
}