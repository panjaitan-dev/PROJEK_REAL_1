<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $table = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
     public function informasi()
    {
        return $this->hasMany(Informasi::class);
    }

     public function berita()
    {
        return $this->hasMany(Berita::class);
    }

     public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

     public function destinasi()
    {
        return $this->hasMany(Destinasi::class);
    }

     public function penginapan()
    {
        return $this->hasMany(Penginapan::class);
    }

     public function umkm()
    {
        return $this->hasMany(Umkm::class);
    }
}
