<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class decoder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Number',
        'client_id',
        'decoder_type_id',
        'user_id',
        'shop_id_decoder',
    ];
}
