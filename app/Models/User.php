<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\View\View;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'number_document';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number_document',
        'name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'address',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_user', 'number_document');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user', 'number_document');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author', 'number_document');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_user', 'number_document');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_user', 'number_document');
    }
    public function adminlte_image()
    {
        return 'https://api.multiavatar.com/BinxBono.png';
    }

    public function adminlte_desc()
    {
        return  'Admin';
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }
}
