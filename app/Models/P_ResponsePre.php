<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P_ResponsePre extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'p_response_pre';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}

