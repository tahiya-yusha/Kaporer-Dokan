<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TshirtPrints extends Model
{
    use HasFactory;
    protected $table = 'tshirtprints';

    protected $fillable = [
        'tshirtorders_id',
        'image'
    ];
}
