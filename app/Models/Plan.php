<?php

namespace App\Models;

use Cknow\Money\Money;
use Cviebrock\EloquentSluggable\Sluggable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'plans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'price',
        'stripe_identifier',
        'billing_period',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function planFormattedPrice(): Money
    {
        return Money::USD($this->price);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'],
        ];
    }
}
