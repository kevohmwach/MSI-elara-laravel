<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class P_CallScript extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'p_call_scripts';

    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
