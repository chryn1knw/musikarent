<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Models\Studio;

class StudioController extends Controller
{
    /**
     * Display a listing of the studios.
     */
    public function index()
    {
        $studios = Studio::query()
        ->when(request('capacity'), function($query) {
            // Filter berdasarkan kapasitas
            if(request('capacity') == 1) {
                return $query->where('capacity', '<=', 5);
            } elseif(request('capacity') == 2) {
                return $query->whereBetween('capacity', [6, 10]);
            } elseif(request('capacity') == 3) {
                return $query->where('capacity', '>=', 11);
            }
        })
        ->when(request('status'), function($query) {
            // Filter berdasarkan status
            return $query->where('status', request('status'));
        })
        ->orderBy('rating', 'desc')
        ->paginate(12);

        return view('customer.studios.index', compact('studios'));
    }

    /**
     * Display the specified studio.
     */
    public function show(Studio $studio)
    {
        return view('customer.studios.show', compact('studio'));
    }

}