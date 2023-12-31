<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;
    const UNPAID = 'Unpaid';
    const PAID = 'Paid';
    protected $fillable = [
        'user_id',
        'state',
        'paid_time',
        'price'
    ];

    const STATES = [self::PAID, self::UNPAID];

    public function factor()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
