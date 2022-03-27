<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'category_id'

    ];

    public function images()
    {
      return $this->hasMany(Image::class, 'product_id');
    }
    public function categories()
    {
      return $this->belongsTo(Categories::class, 'category_id');
    }
}
