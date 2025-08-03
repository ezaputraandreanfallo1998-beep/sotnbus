<?php

namespace App\Http\Controllers;

use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        return view('promotions.index', [
            'promotions' => Promotion::active()
                ->orderBy('end_date', 'asc')
                ->paginate(9)
        ]);
    }

    public function show(Promotion $promotion)
    {
        if (!$promotion->isActive()) {
            abort(404);
        }

        return view('promotions.show', [
            'promotion' => $promotion,
            'relatedPromotions' => Promotion::active()
                ->where('id', '!=', $promotion->id)
                ->inRandomOrder()
                ->limit(3)
                ->get()
        ]);
    }
}