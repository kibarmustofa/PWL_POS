<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable

class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    // use HasFactory;

    protected $table = 'm_user';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  // Mendefinisikan primary key dari tabel yang digunakan
    protected $fillable = ['username', 'password', 'nama', 'level_id', 'created_at', 'updated_at',"foto_profil"];

    protected $hidden = ['password']; // jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash

    /*
     * Relasi ke tabel level
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
        /**
     * Mendapatkan nama role
     */
    public function getRoleName()
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role)
    {
        return $this->level->level_kode == $role;
    }

    /**
     * Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }

}
