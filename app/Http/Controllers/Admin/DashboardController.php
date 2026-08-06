<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $company = CompanyProfile::first();
        $product = Product::first();
        $galleryCount = Gallery::count();
        $galleryCategories = Gallery::query()
            ->pluck('kategori')
            ->unique()
            ->implode(', ');

        $activities = $this->buildActivity($company, $product);

        return view('admin.dashboard', compact(
            'company', 'product', 'galleryCount', 'galleryCategories', 'activities'
        ));
    }

    private function buildActivity($company, $product): array
    {
        $items = [];

        if ($company && $company->updated_at) {
            $items[] = [
                'label' => 'Profil perusahaan diubah',
                'date' => $company->updated_at,
                'icon' => 'building',
            ];
        }

        if ($product && $product->updated_at) {
            $items[] = [
                'label' => 'Produk diperbarui',
                'date' => $product->updated_at,
                'icon' => 'package',
            ];
        }

        $latestGallery = Gallery::latest('updated_at')->first();
        if ($latestGallery && $latestGallery->updated_at) {
            $items[] = [
                'label' => 'Galeri "' . $latestGallery->judul . '" ditambahkan',
                'date' => $latestGallery->updated_at,
                'icon' => 'image',
            ];
        }

        usort($items, fn ($a, $b) => $b['date'] <=> $a['date']);

        return array_map(fn ($item) => [
            'label' => $item['label'],
            'icon' => $item['icon'],
            'time' => $item['date']->gt(now()->subDays(2))
                ? $item['date']->isToday()
                    ? $item['date']->format('H:i') . ' — hari ini'
                    : $item['date']->format('d M Y H:i')
                : $item['date']->isoFormat('D M Y'),
        ], $items);
    }
}
