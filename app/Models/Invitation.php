<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitation extends Model
{
    protected $fillable = [
        'slug',
        'bride_name',
        'bride_father',
        'bride_mother',
        'groom_name',
        'groom_father',
        'groom_mother',
        'akad_start_at',
        'akad_end_at',
        'reception_start_at',
        'reception_end_at',
        'venue_name',
        'venue_address',
        'maps_url',
        'music_path',
        'cover_image',
        'bride_photo',
        'groom_photo',
        'is_active',
    ];

    protected $casts = [
        'akad_start_at'      => 'datetime',
        'akad_end_at'        => 'datetime',
        'reception_start_at' => 'datetime',
        'reception_end_at'   => 'datetime',
        'is_active'          => 'boolean',
    ];

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('sort_order');
    }

    public function rsvps(): HasMany
    {
        return $this->hasMany(Rsvp::class)->latest();
    }

    public function wishes(): HasMany
    {
        return $this->hasMany(Wish::class)->latest();
    }

    public function approvedWishes(): HasMany
    {
        return $this->hasMany(Wish::class)->where('is_approved', true)->latest();
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : null;
    }

    public function getBridePhotoUrlAttribute(): ?string
    {
        return $this->bride_photo ? asset('storage/' . $this->bride_photo) : null;
    }

    public function getGroomPhotoUrlAttribute(): ?string
    {
        return $this->groom_photo ? asset('storage/' . $this->groom_photo) : null;
    }

    public function getMusicUrlAttribute(): ?string
    {
        return $this->music_path ? asset('storage/' . $this->music_path) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
