<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserLead extends Model
{
    use HasFactory;

    protected $fillable = [
      'email',
      'first_name',
      'last_name',
      'phone_number',
    ];

    /**
     * @return HasOne<Address>
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * @return HasMany<Quote>
     */
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

}
