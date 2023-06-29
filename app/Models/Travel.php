<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Travel extends Model
{
    use HasFactory, Sluggable, HasUuids;

    protected $table = 'travels';

    protected $fillable = [
        'is_public',
        'slug',
        'name',
        'description',
        'num_of_days'
    ];

    public function tours(): HasMany
    {
        $this->hasMany(Tour::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    // public function numberOfNights(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value, $attributes) => $attributes['num_of_days'] -1
    //     );
    // }

    public function getNumberOfNightsAttribute()
    {
        return $this->num_of_days - 1;
    }
}
