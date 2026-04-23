<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePre extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'insurance_pre';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
