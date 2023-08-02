<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'cart_id',
        'status',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
