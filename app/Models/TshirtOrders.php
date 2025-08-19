<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TshirtOrders extends Model
{
    use HasFactory;
    protected $table = 'tshirtorders'; // Name of the database table to store the custom orders

    protected $fillable = [
        'user_id', 
        'tshirt_type',
        'tshirt_length',
        'color',
        'print_positions',
        'user_text'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
