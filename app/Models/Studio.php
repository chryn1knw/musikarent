<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_hour',
        'capacity',
        'features',
        'photo_url',
        'status',
        'rating'
    ];

    protected $casts = [
        'price_per_hour' => 'float',
        'capacity' => 'integer',
        'rating' => 'float',
        'features' => 'string',
    ];

    public function getStatusBadgeAttribute()
    {
        return [
            'available' => 'bg-green-100 text-green-800',
            'unavailable' => 'bg-red-100 text-red-800',
            'maintenance' => 'bg-yellow-100 text-yellow-800',
        ][$this->status] ?? 'bg-gray-100 text-gray-800';
    }

    public function getFeaturesListAttribute()
    {
        return $this->features
            ? collect(explode(',', $this->features))
                ->map(fn($item) => trim($item))
                ->implode(', ')
            : 'No features specified';
    }

    public function getImageUrlAttribute()
    {
        return $this->photo_url ? asset('storage/' . $this->photo_url) : asset('images/no-image.jpg');
    }
}