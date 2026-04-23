<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct4her extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'ct4her';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
