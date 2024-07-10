<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected function nombre():Attribute
    {
        return Attribute::make(
            set: function($value){
                return strtolower($value);
            },
            get: function($value){
                return ucfirst($value);
            }
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $fillable = 
    [
        'nombre',
        'descripcion',
    ];
}
