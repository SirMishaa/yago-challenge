<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
      'country',
      'country_iso',
      'street',
      'postal_code',
      'city',
      'province',
    ];

    public function userLead(): BelongsTo
    {
        return $this->belongsTo(UserLead::class);
    }
}
