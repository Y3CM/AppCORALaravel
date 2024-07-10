<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'id_user',
        'category_id',
        'created_at',
        'image_path',
        'image_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'number_document');
    }

    public function categories()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
