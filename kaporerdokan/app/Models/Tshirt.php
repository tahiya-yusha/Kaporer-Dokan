<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TShirt extends Model
{
    protected $table = 'tshirts'; // Update the table name to match the database table name

    protected $fillable = [
        'tshirt_type',
        'tshirt_length',
        'color1',
        'color2',
        'color3',
        'print_positions',
        'image_path',
        'user_text',
    ];

    // If you have a relationship with the User model, you can define it here
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
