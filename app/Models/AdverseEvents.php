<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdverseEvents extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'adverse_event';

    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
