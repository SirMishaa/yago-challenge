<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_lead_id',
        'quote_id',
        'available',
        'coverage_ceiling',
        'deductible',
        'after_delivery',
        'after_liability',
        'professional_indemnity',
        'entrusted_objects',
        'legal_expenses',
    ];


    /**
     * @return BelongsTo<UserLead, Quote>
     */
    public function userLead(): BelongsTo
    {
        return $this->belongsTo(UserLead::class);
    }
}
