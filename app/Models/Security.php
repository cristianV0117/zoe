<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;

    protected $table = "securities";

    protected $fillable = [
        'symbol', 'security_type_id'
    ];

    public function securitiesPrices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SecurityPrice::class);
    }
}
