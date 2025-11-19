<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class UserWadding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template',
        'nama_pria',
        'nama_wanita',
        'tanggal_akad',
        'waktu_akad',
        'tanggal_resepsi',
        'waktu_resepsi',
        'alamat_akad',
        'alamat_resepsi',
        'gmaps_akad',
        'gmaps_resepsi',
        'foto_pria',
        'foto_wanita',
        'foto_hero',
        'ortu_pria',
        'ortu_wanita',
        'no_rekening',
        'nama_pemilik',
        'nama_bank',
        'slug',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->nama_pria, $model->nama_wanita);
            }
        });
    }

    public function getFotoHeroUrlAttribute()
    {
        return $this->foto_hero ? \Storage::url($this->foto_hero) : asset('images/placeholder-hero.png');
    }

    protected static function generateSlug(string $namaPria = '', string $namaWanita = ''): string
    {
        $firstPria   = trim(explode(' ', $namaPria)[0] ?? '');
        $firstWanita = trim(explode(' ', $namaWanita)[0] ?? '');

        $firstPria   = Str::slug($firstPria ?: 'pria', '-');
        $firstWanita = Str::slug($firstWanita ?: 'wanita', '-');

        $random = Str::lower(Str::random(4));

        return "{$firstWanita}-{$firstPria}-{$random}";
    }

    protected static function generateUniqueSlug(string $namaPria = '', string $namaWanita = ''): string
    {
        do {
            $slug = static::generateSlug($namaPria, $namaWanita);
            $exists = static::where('slug', $slug)->exists();
        } while ($exists);

        return $slug;
    }

    public function galeries(): HasMany
    {
        return $this->hasMany(Galeri::class, 'weding_id', 'id');
    }

    public function ucapans(): HasMany
    {
        return $this->hasMany(Ucapan::class, 'weding_id', 'id');
    }
}
