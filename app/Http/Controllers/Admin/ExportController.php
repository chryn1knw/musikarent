<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{

    public function exportCategoriesPdf()
    {
        $categories = \App\Models\InstrumentCategory::all();
        $pdf = Pdf::loadView('admin.exports.categories-pdf', compact('categories'));
        return $pdf->download('categories.pdf');
    }

    public function exportInstrumentsPdf()
    {
        $instruments = \App\Models\Instrument::with('category')->get();
        $pdf = Pdf::loadView('admin.exports.instruments-pdf', compact('instruments'));
        return $pdf->download('instruments.pdf');
    }

    public function exportStudiosPdf()
    {
        $studios = \App\Models\Studio::all();
        $pdf = Pdf::loadView('admin.exports.studios-pdf', compact('studios'));
        return $pdf->download('studios.pdf');
    }
}