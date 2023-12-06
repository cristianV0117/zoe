<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityPrice extends Model
{
    use HasFactory, HasRelationships;

    protected $fillable = [
        'last_price', 'as_of_date', 'security_id'
    ];

    public function security(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Security::class);
    }
}
