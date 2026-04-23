<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerPre extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'practitioner';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
