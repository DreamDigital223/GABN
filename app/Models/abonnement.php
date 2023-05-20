<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonnement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'decoder_id',
        'abonnement_type_id',
        'StartDate',
        'EndDate',
        'month',
        'date_time',
        'user_id_abn',
        'shop_id_abonnement',
    ];
}
