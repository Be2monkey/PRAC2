<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id)
    {
        $brand = Brand::findOrFail($brand_id);

        $manual = Manual::findOrFail($manual_id);


        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }
    public function clicks($id){
        $manual = Manual::findOrFail($id);
        $manual->increment('visits');

        if($manual->locally_available){
            return redirect()->away(route('manual.download'. $manual->id));
        } else{
            return redirect()->away($manual->originUrl);
        }
    }
    public function showHomepage()
    {
        $topManuals = Manual::select('manuals.name as type', 'brands.name as brand')
                            ->join('brands', 'manuals.brand_id', '=', 'brands.id')
                            ->orderBy('manuals.visits', 'desc')
                            ->limit(10)
                            ->get();


        $brands = Brand::all();

        return view('pages.homepage', [
            'topManuals' => $topManuals,
            'brands' => $brands,
        ]);
    }
}

