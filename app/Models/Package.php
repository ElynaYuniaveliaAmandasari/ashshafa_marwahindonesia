<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'attributes' => 'array',
    ];
    public function category()
    {
        // Satu paket Milik Satu Kategori
        return $this->belongsTo(Category::class);
    }
    public function prices()
    {
        // Satu Paket 'hasMany' (punya banyak) Harga
        return $this->hasMany(PackagePrice::class);
    }
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'price',
        'image_url',
        'is_featured',
        'departure_date',
        'duration_days',
        'airline',
        'departure_city',
        'hotel_makkah',
        'hotel_madinah',
        'other_hotels',
        'total_seats',
        'seats_filled',
        'attributes',
        'include_items', // Tambahkan ini
        'exclude_items', // Tambahkan ini
    ];
}
