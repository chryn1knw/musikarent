<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'category_id',
        'price_per_day',
        'stock',
        'photo_url',
        'description',
        'status'
    ];

    protected $casts = [
        'price_per_day' => 'float',
        'stock' => 'integer'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
    
    public function category()
    {
        return $this->belongsTo(InstrumentCategory::class);
    }

    public function getStatusBadgeAttribute()
    {
        return [
            'available' => 'bg-green-100 text-green-800',
            'unavailable' => 'bg-red-100 text-red-800',
            'maintenance' => 'bg-yellow-100 text-yellow-800',
        ][$this->status] ?? 'bg-gray-100 text-gray-800';
    }
}