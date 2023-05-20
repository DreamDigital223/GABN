<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonnement_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'prix',
        'Designation_abn',
        'decoder_type_id',
        
    ];
}
