<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function packages()
    {
        // Satu kategori Punya Banyak Paket
        return $this->hasMany(Package::class);
    }
}
