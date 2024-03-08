<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    protected $fillable = [
        'user_id',
        'item_id',
        'checkout_date',
        'due_date',
        'returned_date',
    ];

    use HasFactory;
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    public function item()
    {
        return $this->belongsTo(Item::class);

    }

}
