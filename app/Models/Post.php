<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'title',
        'slug',
        'category',
        'content',
        'image',
        'resumen',
        'author',
        'is_published'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function user()
{
    return $this->belongsTo(User::class, 'author', 'number_document');
}
}
