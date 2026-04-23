<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsePre extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'response_pre';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
