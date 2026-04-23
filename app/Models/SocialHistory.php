<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'social_history';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
