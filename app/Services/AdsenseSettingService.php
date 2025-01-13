<?php

namespace App\Services;

use App\Models\AdsenseSetting;
use App\Repositories\AdsenseSettingRepository;
use Illuminate\Database\Eloquent\Collection;

class AdsenseSettingService
{
    protected AdsenseSettingRepository $repository;

    public const PAGES = [
        'script' => 'script',
        'features' => 'features',
        'generators' => 'generators',
        'who_is_for' => 'who_is_for',
        'custom_templates' => 'custom_templates',
        'tools' => 'tools',
        'how_it_works' => 'how_it_works',
        'testimonials' => 'testimonials',
        'pricing' => 'pricing',
        'faq' => 'faq',
        'gdpr' => 'gdpr'
    ];

    public function __construct(AdsenseSettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($data): AdsenseSetting
    {
        return $this->repository->create($data);
    }

    public function getByPlace($place): AdsenseSetting
    {
        return $this->repository->getByPlace($place);
    }

    public function getSettings(): ? Collection
    {
        return $this->repository->getSettings();
    }

    public function update(AdsenseSetting $adsenseSetting, array $data): AdsenseSetting
    {
        return $this->repository->saveSettings($adsenseSetting, $data);
    }
}